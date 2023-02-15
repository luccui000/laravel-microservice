<template>
  <div class="col-6 col-sm-2 col-md-3 col-lg-3 item" v-if="product"> 
    <div class="product-image"> 
      <router-link :to="`/products/${product.id}`" class="grid-view-item__link"> 
        <img 
          class="primary lazyload" 
          :data-src="product.image_origin" 
          :src="product.image_origin" 
           alt="image" title="product"> 
        <img 
          class="hover lazyload" 
          :data-src="product.image_origin" 
          :src="product.image_origin" alt="image" title="product"> 
        <img class="grid-view-item__image hover variantImg" :src="product.image_origin" alt="image" title="product"> 
        <div class="product-labels rounded">
          <span class="lbl on-sale">HOT</span>
          <span class="lbl pr-label1">NEW</span>
        </div> 
      </router-link> 
      <div class="saleTime desktop" data-countdown="2022/03/01"></div> 
      <div class="variants add">
        <button @click="addToCart" class="btn btn-addto-cart" type="button" tabindex="0">
          Thêm vào giỏ hàng
        </button>
      </div>
      <div class="button-set"> 
        <a class="quick-view-popup quick-view" >
          <i class="icon anm anm-search-plus-r"></i>
        </a>
        <div class="wishlist-btn">
          <a class="wishlist add-to-wishlist" href="#">
            <i class="icon anm anm-heart-l"></i>
          </a>
        </div>
        <div class="compare-btn">
          <a class="compare add-to-compare" href="#" title="Add to Compare">
            <i class="icon anm anm-random-r"></i>
          </a>
        </div>
      </div> 
    </div> 
    <div class="product-details text-center"> 
      <div class="product-name">
        <router-link :to="`/products/${product.id}`">{{ product.name  }}</router-link>
      </div> 
      <div v-if="product.has_variant" class="product-price">
        <div class="product-price">
          <span class="price">{{ product.min_price | vietnamdong }}</span>
          -
          <span class="price">{{ product.max_price | vietnamdong }}</span> 
        </div> 
      </div> 
      <div v-else class="product-price">
        <div class="product-price">
          <span class="price">{{ product.price | vietnamdong }}</span>
          -
          <span class="price">{{ product.sell_price | vietnamdong }}</span> 
        </div> 
      </div> 
    </div> 
  </div>
</template>

<script>

export default {
  name: 'NewArrivalsItem',
  props: ['product'],
  methods: {
    addToCart() { 
      let has_variant = this.product.has_variant;

      this.$store.dispatch('order/addToCart', {
        product_id: this.product.id,
        sku_id: has_variant ? this.item.sku_id : null,
        qty: this.quantity
      }).then(() => { 
        this.$notify({
          group: 'alert',
          title: 'Thành công',
          text: 'Thêm vào giỏ hàng thành công',
          type: 'success'
        })
      })
    }
  }
}
</script>