<template>
  <div class="col-12 item"> 
    <div class="product-image"> 
      <a href="product-layout-1.html" class="grid-view-item__link"> 
        <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image1.jpg" src="assets/images/product-images/product-image1.jpg" alt="image" title="product"> 
        <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image1-1.jpg" src="assets/images/product-images/product-image1-1.jpg" alt="image" title="product"> 
        <img class="grid-view-item__image hover variantImg" src="assets/images/product-images/product-image1.jpg" alt="image" title="product"> 
        <div class="product-labels rounded">
          <span class="lbl on-sale">Sale</span>
          <span class="lbl pr-label1">new</span>
        </div> 
      </a> 
      <div class="saleTime desktop" data-countdown="2022/03/01"></div> 
      <form class="variants add" action="#" onclick="window.location.href='cart.html'" method="post">
        <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
      </form>
      <div class="button-set">
        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
          <i class="icon anm anm-search-plus-r"></i>
        </a>
        <div class="wishlist-btn">
          <a class="wishlist add-to-wishlist" href="wishlist.html">
            <i class="icon anm anm-heart-l"></i>
          </a>
        </div>
        <div class="compare-btn">
          <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
            <i class="icon anm anm-random-r"></i>
          </a>
        </div>
      </div> 
    </div> 
    <div class="product-details text-center"> 
      <div class="product-name">
        <a href="product-layout-1.html">Edna Dress</a>
      </div> 
      <div class="product-price">
        <span class="old-price">$500.00</span>
        <span class="price">$600.00</span>
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
  name: 'WeeklyBestsellerItem'
}

</script>