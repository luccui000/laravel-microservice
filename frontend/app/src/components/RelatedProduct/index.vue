<template>
  <div class="related-product grid-products">
    <header class="section-header">
      <h2 class="section-header__title text-center h2">
        <span>Related Products</span>
      </h2>
      <p class="sub-heading">You can stop autoplay, increase/decrease aniamtion speed and number of grid to show and products from store admin.</p>
    </header>
    <vue-slick-carousel v-bind="settings" class="productPageSlider row">
      <related-product-item></related-product-item>
      <related-product-item></related-product-item>
      <related-product-item></related-product-item>
      <related-product-item></related-product-item>
      <related-product-item></related-product-item>
      <related-product-item></related-product-item>
      <related-product-item></related-product-item>
      <related-product-item></related-product-item>
    </vue-slick-carousel> 
  </div>
</template>

<script>
import RelatedProductItem from "@/components/RelatedProduct/item";
import VueSlickCarousel from "vue-slick-carousel";

export default {
  name: 'RelatedProduct',
  components: {RelatedProductItem, VueSlickCarousel},
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

<style scoped>

</style>