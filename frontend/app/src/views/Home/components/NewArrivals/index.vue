<template>
  <div class="product-rows section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <div class="section-header text-center">
            <h2 class="h2">New Arrivals</h2>
            <p>Grab these new items before they are gone!</p>
          </div>
        </div>
      </div>
      <div class="grid-products">
        <div class="row">
          <new-arrivals-item></new-arrivals-item>
          <new-arrivals-item></new-arrivals-item>
          <new-arrivals-item></new-arrivals-item>
          <new-arrivals-item></new-arrivals-item>
          <new-arrivals-item></new-arrivals-item>
          <new-arrivals-item></new-arrivals-item>
          <new-arrivals-item></new-arrivals-item>
          <new-arrivals-item></new-arrivals-item>
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <a href="#" class="btn">View all</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NewArrivalsItem from '@/views/Home/components/NewArrivals/Item.vue';

export default {
  name: 'NewArrivals',
  components: {
    NewArrivalsItem
  }
}
</script>