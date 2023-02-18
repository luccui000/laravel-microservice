<template>
  <div class="related-product grid-products">
    <header class="section-header">
      <h2 class="section-header__title text-center h2"><span>Sản phẩm bạn vừa xem</span></h2>
      <p class="sub-heading">Bạn có thể quản lý phần này trong trang quản trị</p>
    </header>
    <vue-slick-carousel v-bind="settings" class="related-product grid-products">
      <recently-viewed-item 
        v-for="product in products"
        :key="product.id"
        :product="product"
      /> 
    </vue-slick-carousel>
  </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel';
import { settings } from '@/config/carousel'
import RecentlyViewedItem from "@/components/RecentlyViewed/item";
import product from '@/apis/resources/product';

export default {
  name: 'RecentlyViewed',
  components: {
    RecentlyViewedItem,
    VueSlickCarousel
  },
  data() {
    return {
      settings: settings,
      products: []
    }
  },
  beforeMount() {
    product.getTop10()
      .then(response => {
        const { data } = response;
        this.products = data.data;
      })
  }
}
</script>

<style scoped>

</style>