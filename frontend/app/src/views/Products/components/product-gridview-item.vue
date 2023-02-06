<template>
  <div class="col-6 col-sm-6 col-md-4 col-lg-3 item" v-if="product"> 
    <div class="product-image"> 
      <router-link :to="{ name: 'products.show', params: { id: product.id} }"> 
        <img 
          class="primary lazyload" 
          :data-src="'assets/images/product-images/product-image1-1.jpg'"
          :src="'assets/images/product-images/product-image1-1.jpg'"
          alt="image" 
          title="product"
        > 
        <img class="hover lazyload" data-src="assets/images/product-images/product-image1-1.jpg" src="assets/images/product-images/product-image1-1.jpg" alt="image" title="product"> 
        <div class="product-labels rectangular">
          <span class="lbl on-sale">HOT</span>
          <span class="lbl pr-label1">new</span>
        </div>
      </router-link> 
      <div class="variants add">
        <button 
          class="btn btn-addto-cart"
          @click="addToCart" 
        >Thêm vào giỏ hàng</button>
      </div>
      <div class="button-set">
        <div 
          title="Quick View"
          class="quick-view-popup quick-view quick-btn"
          @click="quickViewProduct"
        >
          <i class="icon anm anm-search-plus-r"></i>
        </div>
        <div class="wishlist-btn">
          <div 
            class="wishlist add-to-wishlist quick-btn" 
            title="Add to Wishlist"
            @click="addToWishlist"
          >
            <i class="icon anm anm-heart-l"></i>
          </div>
        </div>
        <div class="compare-btn">
          <div 
            class="compare add-to-compare quick-btn" 
            title="Add to Compare"
            @click="addToCompare"
          >
            <i class="icon anm anm-random-r"></i>
          </div>
        </div>
      </div> 
    </div> 
    <div class="product-details text-center"> 
      <div class="product-name">
        <router-link :to="{ name: 'products.show', params: { id: product.id} }">
          {{ product.name }}
        </router-link> 
      </div>
      <div class="product-price" > 
        <div v-if="hasVariant">
          <span class="price">{{ product.min_price | vietnamdong }}</span>
          <span> - </span>
          <span class="price">{{ product.max_price | vietnamdong }}</span>
        </div>
        <div v-else>
          <span class="price">
            {{ product.sell_price | vietnamdong }}
          </span>
        </div>
      </div> 
      <div class="product-review">
        <i class="font-13 fa fa-star"></i>
        <i class="font-13 fa fa-star"></i>
        <i class="font-13 fa fa-star"></i>
        <i class="font-13 fa fa-star-o"></i>
        <i class="font-13 fa fa-star-o"></i>
      </div>  
    </div> 
  </div> 
</template>

<script> 

export default {
  name: 'ProductGridviewItem',
  props: ['product'],
  computed: {
    hasVariant() {
      return this.product.has_variant;
    }
  },
  methods: {
    quickViewProduct() {
      this.$emit('quick-view', this.product);
    },
    addToCart() { 
      this.$store.dispatch('order/addToCart', {
        product_id: this.product.id,
        sku_id: this.product.skus[0]?.id,
        qty: 1
      }).then(response => {
        console.log(response)
      })
    },
    addToWishlist() {
      console.log(this.product);
    },
    addToCompare() {
      console.log(this.product)
    }
  }
}
</script>

<style scoped>
.quick-btn {
  transition: .3s linear;
}

.quick-btn:hover {
  background-color: #000;
  cursor: pointer;
  color: #fff;
}
</style>