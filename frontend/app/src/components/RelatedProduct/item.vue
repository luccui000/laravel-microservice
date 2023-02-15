<template>
  <div class="col-12 item" v-if="product">
    <div class="product-image">
      <router-link :to="`/products/${product.id}`" class="grid-view-item__link">
        <img 
          class="primary lazyload" 
          :data-src="product.image_origin" :src="product.image_origin" alt="image" title="product">
        <img class="hover lazyload" 
          :data-src="product.image_origin" 
          :src="product.image_origin" alt="image" title="product">
        <img class="grid-view-item__image hover variantImg" :src="product.image_origin" alt="image" title="product"> 
      </router-link>
      <div class="saleTime desktop" data-countdown="2022/03/01"></div>
      <div class="variants add" >
        <button class="btn btn-addto-cart" type="button" tabindex="0">
          Thêm vào giỏ hàng
        </button>
      </div>
      <div class="button-set">
        <a href="#" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
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
        <span class="price">{{  product.min_price | vietnamdong }}</span>
        -
        <span class="price">{{  product.max_price | vietnamdong }}</span>
      </div> 
      <div v-else class="product-price">
        <span class="price">{{  product.price | vietnamdong }}</span>
        -
        <span class="price">{{  product.sell_price | vietnamdong }}</span>
      </div>
    </div>
    <quick-view 
      :product="product" 
      :isShow="isShow" 
      @close="closeQuickView"
    />
  </div>
</template>

<script>
import QuickView from '@/components/QuickView/index.vue'

export default {
  name: 'RelatedProductItem',
  props: ['product'],
  components: {
    QuickView
  },
  data() {
    return{
      isShow: false
    }
  },
  methods: {
    closeQuickView(isShow) {
      this.isShow = isShow;
    }
  }
}
</script>

<style scoped>

</style>