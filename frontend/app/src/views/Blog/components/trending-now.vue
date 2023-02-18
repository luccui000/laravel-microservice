<template>
  <div class="sidebar_widget">
    <div class="widget-title">
      <h2>Xu hướng</h2>
    </div>
    <div class="widget-content">
      <div class="list list-sidebar-products">
        <div class="grid">
          <div class="grid__item">
            <div class="mini-list-item">
              <div class="mini-view_image">
                <a class="grid-view-item__link" href="#">
                  <img class="grid-view-item__image blur-up ls-is-cached lazyloaded" data-src="assets/images/product-images/mini-product-img.jpg" src="assets/images/product-images/mini-product-img.jpg" alt="">
                </a>
              </div>
              <div class="details">
                <a class="grid-view-item__title" href="#">Áo thun nữ nhiều màu cổ tròn</a>
                <div class="grid-view-item__meta">
                  <span class="product-price__price">
                    <span class="money">{{  199000 | vietnamdong }} - {{  199000 | vietnamdong }}</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'TrendingNowComponent'
}

</script>