<template>
  <div class="col-6 col-sm-6 col-md-4 col-lg-3 item"> 
    <div class="product-image"> 
      <a href="#"> 
        <img class="primary lazyload" data-src="assets/images/product-images/product-image1.jpg" src="assets/images/product-images/product-image1.jpg" alt="image" title="product"> 
        <img class="hover lazyload" data-src="assets/images/product-images/product-image1-1.jpg" src="assets/images/product-images/product-image1-1.jpg" alt="image" title="product"> 
        <div class="product-labels rectangular">
          <span class="lbl on-sale">-16%</span>
          <span class="lbl pr-label1">new</span>
        </div> 
      </a> 
      <div class="saleTime desktop" data-countdown="2022/03/01"></div> 
      <form class="variants add" action="#" onclick="window.location.href='cart.html'" method="post">
        <button class="btn btn-addto-cart" type="button">Select Options</button>
      </form>
      <div class="button-set">
        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
          <i class="icon anm anm-search-plus-r"></i>
        </a>
        <div class="wishlist-btn">
          <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
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
        <a href="#">Edna Dress</a>
      </div> 
      <div class="product-price">
        <span class="old-price">$500.00</span>
        <span class="price">$600.00</span>
      </div> 
      <div class="product-review">
        <i class="font-13 fa fa-star"></i>
        <i class="font-13 fa fa-star"></i>
        <i class="font-13 fa fa-star"></i>
        <i class="font-13 fa fa-star-o"></i>
        <i class="font-13 fa fa-star-o"></i>
      </div> 
      <ul class="swatches">
        <li class="swatch medium rounded">
          <img src="assets/images/product-images/variant1.jpg" alt="image" />
        </li>
        <li class="swatch medium rounded">
          <img src="assets/images/product-images/variant2.jpg" alt="image" />
        </li>
        <li class="swatch medium rounded">
          <img src="assets/images/product-images/variant3.jpg" alt="image" />
        </li>
        <li class="swatch medium rounded">
          <img src="assets/images/product-images/variant4.jpg" alt="image" />
        </li>
        <li class="swatch medium rounded">
          <img src="assets/images/product-images/variant5.jpg" alt="image" />
        </li>
        <li class="swatch medium rounded">
          <img src="assets/images/product-images/variant6.jpg" alt="image" />
        </li>
      </ul> 
    </div> 
    <div class="timermobile">
      <div class="saleTime desktop" data-countdown="2022/03/01"></div>
    </div> 
  </div>
</template>

<script>

export default {
  name: 'ProductItem',
}
</script>