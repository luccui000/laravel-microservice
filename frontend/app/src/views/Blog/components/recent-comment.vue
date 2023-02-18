<template>
  <div class="sidebar_widget">
    <div class="widget-title">
      <h2>Bình luận gần đây</h2>
    </div>
    <div class="widget-content">
      <div class="list list-sidebar-products">
        <div class="grid">
          <div class="grid__item">
            <div class="mini-list-item">
              <div class="mini-view_image">
                <a class="grid-view-item__link" href="#">
                  <img class="grid-view-item__image blur-up ls-is-cached lazyloaded" data-src="assets/images/recent-commnet-img.jpg" src="assets/images/recent-commnet-img.jpg" alt="">
                </a>
              </div>
              <div class="details">
                <div class="grid-view-item__meta">
                  <strong>Minh Lực</strong> On <a href="#">Test</a>
                </div>
                <a class="grid-view-item__title" href="#">Test bình luận</a>
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
  name: 'RecentCommentComponent'
}

</script>