<template>
  <div class="col-12 item" v-if="product">
    <div class="product-image">
      <a href="#">
        <img class="primary lazyload" 
          :data-src="product.image_origin" :src="product.image_origin" alt="image" title="product">
        <img class="hover lazyload" :data-src="product.image_origin" :src="product.image_origin" alt="image" title="product">
        <div class="product-labels rectangular">
          <span class="lbl on-sale">HOT</span>
          <span class="lbl pr-label1">new</span>
        </div>
      </a>
    </div>
    <div class="product-details text-center">
      <div class="product-name">
        <router-link :to="`/products/${product.id}`">{{  product.name }}</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'RecentlyViewedItem',
  props: ['product']
}
</script>

<style scoped>

</style>