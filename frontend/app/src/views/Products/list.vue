<template>
  <div class="grid-products grid--view-items">
    <div class="row">
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
      <product-item></product-item>
    </div>
  </div>
</template>

<script>
import ProductItem from '@/views/Products/item';

export default {
  name: 'ProductList',
  components: {
    ProductItem
  }
}
</script>