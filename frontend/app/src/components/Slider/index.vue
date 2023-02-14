<template>  
  <vue-slick-carousel :arrows="true" :dots="true"> 
    <div class="blur-up lazyloaded">
      <img class="blur-up lazyloaded" data-src="assets/images/slideshow-banners/home2-default-banner1.jpg" src="assets/images/slideshow-banners/home2-default-banner1.jpg" alt="Shop Our New Collection" title="Shop Our New Collection" />
      <div class="slideshow__text-wrap slideshow__overlay classic middle">
        <div class="slideshow__text-content middle">
          <div class="container">
            <div class="wrap-caption right">
              <h2 class="h1 mega-title slideshow__title">Bộ sưu tập mùa thu</h2>
              <span class="mega-subtitle slideshow__subtitle">Giảm giá 20% cho tất cả các đơn</span>
              <span class="btn ml-2">Mua sắm ngay</span>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="blur-up lazyloaded">
      <img class="blur-up lazyloaded" data-src="assets/images/slideshow-banners/home2-default-banner2.jpg" src="assets/images/slideshow-banners/home2-default-banner2.jpg" alt="Summer Bikini Collection" title="Summer Bikini Collection" />
      <div class="slideshow__text-wrap slideshow__overlay classic middle">
        <div class="slideshow__text-content middle">
          <div class="container">
            <div class="wrap-caption center">
              <h2 class="h1 mega-title slideshow__title">Thời trang xuân thu</h2>
              <span class="mega-subtitle slideshow__subtitle">Một thế giờ thời trang và quần áo hợp thời trang</span>
              <span class="btn ml-2">Mua sắm ngay</span>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </vue-slick-carousel>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'

export default {
  name: 'PageSlider',
  components: { 
    VueSlickCarousel
  }
}
</script>
