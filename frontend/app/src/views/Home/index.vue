<template>
  <div>
    <!-- Home slider -->
    <page-slider></page-slider>
    <!-- Weekly bestseller -->
    <weekly-bestseller></weekly-bestseller>
    <!-- Advertisement -->
    <advertisement></advertisement>
    <!-- New Arrivals -->
    <new-arrivals></new-arrivals>
    <!-- Most loved brands -->
    <most-loved-brands></most-loved-brands>
    <!-- Footer -->
    <footer id="footer" class="footer-2">
      <new-letter></new-letter>
      <page-footer></page-footer>
    </footer>
  </div> 
</template>

<script>
import PageSlider from '@/components/Slider';
import WeeklyBestseller from '@/components/WeeklyBestseller';
import Advertisement from '@/components/Advertisement';
import NewArrivals from '@/components/NewArrivals';
import MostLovedBrands from '@/components/MostLovedBrands';
import NewLetter from '@/components/NewLetter';
import PageFooter from '@/components/Footer';

export default {
  name: 'HomePage',
  components: {
    
    PageSlider,
    WeeklyBestseller,
    Advertisement,
    NewArrivals,
    MostLovedBrands,
    NewLetter,
    PageFooter,
  },
  data() {
    return {

    }
  }
}
</script>
<style> 
</style>