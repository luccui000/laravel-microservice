<template>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <div class="section-header text-center">
            <h2 class="h2">Weekly Bestseller</h2>
            <p>Our most popular products based on sales</p>
          </div>
          <div class="grid-products">
            <vue-slick-carousel v-bind="settings">
              <weekly-bestseller-item></weekly-bestseller-item>
              <weekly-bestseller-item></weekly-bestseller-item>
              <weekly-bestseller-item></weekly-bestseller-item>
              <weekly-bestseller-item></weekly-bestseller-item>
              <weekly-bestseller-item></weekly-bestseller-item>
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