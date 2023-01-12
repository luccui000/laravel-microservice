<template>
  <div class="list-product list-view-item">
    <div class="list-view-item__image-column">
      <div class="list-view-item__image-wrapper">
        <!-- Image -->
        <a href="#">
          <img class="list-view-item__image blur-up lazyloaded" data-src="assets/images/product-images/product-image1.jpg" src="assets/images/product-images/product-image1.jpg" alt="image" title="product">
        </a>
        <!-- End Image -->
      </div>
    </div>
    <div class="list-view-item__title-column">
      <div class="h4 grid-view-item__title">
        <router-link :to="{ name: 'products.show', params: { id: product.id} }">
          {{ product.name }}
        </router-link>  
      </div>
      <!-- Product Review -->
      <p class="product-review">
        <i class="font-13 fa fa-star"></i>
        <i class="font-13 fa fa-star"></i>
        <i class="font-13 fa fa-star"></i>
        <i class="font-13 fa fa-star-o"></i>
        <i class="font-13 fa fa-star-o"></i>
      </p>
      <!-- End Product Review -->
      <!-- Sort Description -->
      <p>{{  product.description }}</p>
      <!-- End Sort Description -->
      <!-- Price -->
      <div class="product-price grid-view-item__meta">
        <div v-if="hasMinMaxPrice">
          <span class="price">{{ product.min_price | vietnamdong }}</span>
          <span> - </span>
          <span class="price">{{ product.max_price | vietnamdong }}</span>
        </div>
        <div v-else>
          <span class="price">
            {{ product.price | vietnamdong }}
          </span>
        </div>
      </div>
      <!-- End Price -->
      <div class="variants">
        <button 
          class="btn btn--small" 
          @click="addToCart"
        >Thêm vào giỏ hàng</button>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'ProductListviewItem',
  props: ['product'],
  computed: {
    hasMinMaxPrice() {
      return this.product.min_price && this.product.max_price;
    }
  },
  methods: {
    addToCart() {
      console.log(this.product)
    }
  },
}
</script>