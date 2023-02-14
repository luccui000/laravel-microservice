<template>
  <div class="col-12 item"> 
    <div class="product-image"> 
      <router-link to="product-layout-1.html" class="grid-view-item__link"> 
        <img 
          class="primary blur-up lazyloaded" 
          :data-src="product.image_origin"
          :src="product.image_origin"
          alt="image" title="product"> 
        <img 
          class="hover blur-up lazyloaded" 
          :data-src="product.image_origin"
          :src="product.image_origin"
          alt="image" title="product"> 
        <img 
          class="grid-view-item__image hover variantImg" 
          src="assets/images/product-images/product-image1.jpg" 
          alt="image" title="product"> 
        <div class="product-labels rounded">
          <span class="lbl on-sale">HOT</span>
          <span class="lbl pr-label1">NEW</span>
        </div> 
      </router-link> 
      <div class="saleTime desktop" data-countdown="2022/03/01"></div> 
      <div class="variants add">
        <button class="btn btn-addto-cart" type="button" tabindex="0">Thêm vào giỏ hàng</button>
      </div>
      <div class="button-set">
        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
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
        <a href="product-layout-1.html">{{ product.name }}</a>
      </div> 
      <div v-if="!product.has_variant" class="product-price">
        <span class="price">{{ product.price | vietnamdong }}</span>
        -
        <span class="price">{{ product.sell_price | vietnamdong }}</span>
      </div>
      <div v-else class="product-price">
        <span class="price">{{ product.min_price | vietnamdong }}</span>
        -
        <span class="price">{{ product.max_price | vietnamdong }}</span>
      </div> 
      <ul class="swatches">
        <li class="swatch small rounded navy" rel="assets/images/product-images/product-image-stw1.jpg"></li>
        <li class="swatch small rounded green" rel="assets/images/product-images/product-image-stw1-1.jpg"></li>
        <li class="swatch small rounded gray" rel="assets/images/product-images/product-image-stw1-2.jpg"></li>
        <li class="swatch small rounded aqua" rel="assets/images/product-images/product-image-stw1-3.jpg"></li>
        <li class="swatch small rounded orange" rel="assets/images/product-images/product-image-stw1-4.jpg"></li>
      </ul>
    </div> 
  </div>
</template>

<script>

export default {
  name: 'WeeklyBestsellerItem',
  props: ['product'],
  computed: {
    price() {
      return 1;
    }
  }
}

</script>