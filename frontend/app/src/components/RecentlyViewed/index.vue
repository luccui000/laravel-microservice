<template>
  <div class="related-product grid-products">
    <header class="section-header">
      <h2 class="section-header__title text-center h2"><span>Recently Viewed Product</span></h2>
      <p class="sub-heading">You can manage this section from store admin as describe in above section</p>
    </header>
    <vue-slick-carousel v-bind="settings" class="related-product grid-products">
      <recently-viewed-item></recently-viewed-item>
      <recently-viewed-item></recently-viewed-item>
      <recently-viewed-item></recently-viewed-item>
      <recently-viewed-item></recently-viewed-item>
      <recently-viewed-item></recently-viewed-item>
      <recently-viewed-item></recently-viewed-item>
      <recently-viewed-item></recently-viewed-item>
      <recently-viewed-item></recently-viewed-item>
    </vue-slick-carousel>
  </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel';
import { settings } from '@/config/carousel'
import RecentlyViewedItem from "@/components/RecentlyViewed/item";

export default {
  name: 'RecentlyViewed',
  components: {
    RecentlyViewedItem,
    VueSlickCarousel
  },
  data() {
    return {
      settings
    }
  }
}
</script>

<style scoped>

</style>