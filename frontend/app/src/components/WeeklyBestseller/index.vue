<template>
  <div class="section" v-if="products">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <div class="section-header text-center">
            <h2 class="h2">Bán nhiều nhất trong tuần qua</h2>
            <p>Các sản phẩm dựa trên doanh số bán ra trong tuần qua</p>
          </div>
          <div class="grid-products"> 
            <vue-slick-carousel v-bind="settings">
              <weekly-bestseller-item
                v-for="product in products"
                :key="product.id"
                :product="product"
              /> 
            </vue-slick-carousel>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import WeeklyBestsellerItem from '@/components/WeeklyBestseller/Item.vue';
import VueSlickCarousel from 'vue-slick-carousel'

export default {
  name: 'WeeklyBestseller',
  props: ['products'],
  components: {
    VueSlickCarousel,
    WeeklyBestsellerItem, 
  },
  data() {
    return {
      settings: {
        dots: true,
        focusOnSelect: true,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 3,
        touchThreshold: 5
      }
    }
  }
}

</script>