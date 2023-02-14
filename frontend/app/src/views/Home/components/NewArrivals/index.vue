<template>
  <div class="product-rows section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <div class="section-header text-center">
            <h2 class="h2">Hàng vừa mới nhập</h2>
            <p>Nhanh chân mua sắm nào các bạn ơi!</p>
          </div>
        </div>
      </div>
      <div class="grid-products">
        <div class="row">
          <new-arrivals-item
            v-for="product in products"
            :key="product.id"
            :product="product"
          />
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <router-link to="/products" class="btn">Xem tất cả</router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NewArrivalsItem from './Item.vue';

export default {
  name: 'NewArrivals',
  components: {
    NewArrivalsItem
  },
  computed: {
    products() {
      return this.$store.state.home.newests;
    }
  }
}
</script>