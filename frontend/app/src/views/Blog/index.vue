<template>
  <div>
    <div id="page-content">
      <!--Page Title-->
      <div class="page section-header text-center mb-0">
        <div class="page-title">
          <div class="wrapper">
            <h1 class="page-width">Danh sách bài viết</h1>
          </div>
        </div>
      </div>
      <!--End Page Title-->
      <div class="bredcrumbWrap">
        <div class="container breadcrumbs">
          <router-link to="/"  title="Back to the home page">Trang chủ</router-link>
          <span aria-hidden="true">›</span>
          <span>Blog</span>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <!--Main Content-->
          <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
            <div class="custom-search">
              <form action="#" method="get" class="input-group search-header search" role="search" style="position: relative;">
                <input class="search-header__input search__input input-group__field" type="search" name="q" placeholder="Tìm kiếm" aria-label="Search" autocomplete="off">
                <span class="input-group__btn">
                  <button class="btnSearch" type="submit">
                    <i class="icon anm anm-search-l"></i>
                  </button>
                </span>
              </form>
            </div>
            <div class="blog--list-view blog--grid-load-more">
              <div class="article" style="display: block;">
                <!-- Article Image -->
                <a class="article_featured-image" href="#">
                  <img class="blur-up lazyloaded" data-src="assets/images/blog/blog-post-1.jpg" src="assets/images/blog/blog-post-1.jpg" alt="It's all about how you wear">
                </a>
                <h2 class="h3">
                  <a href="blog-left-sidebar.html">Tầm quan trọng của thời trang trong cuộc sống hiện đại</a>
                </h2>
                <ul class="publish-detail">
                  <li>
                    <i class="anm anm-user-al" aria-hidden="true"></i> User
                  </li>
                  <li>
                    <i class="icon anm anm-clock-r"></i>
                    <time datetime="2017-05-02">May 02, 2023</time>
                  </li>
                  <li>
                    <ul class="inline-list">
                      <li>
                        <i class="icon anm anm-comments-l"></i>
                        <a href="#"> 0 bình luận</a>
                      </li>
                    </ul>
                  </li>
                </ul>
                <div class="rte">
                  <p>Một trong những lý do khiến thời trang trở thành một phần tất yếu của cuộc sống bởi đây chính là lựa chọn hàng đầu để chúng ta thể hiện ngôn ngữ riêng của chính mình. Cũng như con người, mỗi thiết kế, mỗi phụ kiện hay mỗi phần của thời trang đều mang những cá tính riêng, câu chuyện và một ý nghĩa riêng. Do đó, để nói lên tiếng nói riêng của bản thân, nhiều người lựa chọn cho mình thời trang như một cách thể hiện.......</p>
                </div>
                <p>
                  <a href="#" class="btn btn-secondary btn--small">Đọc thêm <i class="fa fa-caret-right" aria-hidden="true"></i>
                  </a>
                </p>
              </div>
              <div class="article" style="display: block;">
                <!-- Article Image -->
                <a class="article_featured-image" href="#">
                  <img class="blur-up lazyloaded" data-src="assets/images/blog/blog-post-2.jpg" src="assets/images/blog/blog-post-2.jpg" alt="27 Days of Spring Fashion Recap">
                </a>
                <h2 class="h3">
                  <a href="blog-right-sidebar.html">Biến hóa phong cách trẻ trung và thời thượng cùng BST Xuân Hè 2023</a>
                </h2>
                <ul class="publish-detail">
                  <li>
                    <i class="anm anm-user-al" aria-hidden="true"></i> User
                  </li>
                  <li>
                    <i class="icon anm anm-clock-r"></i>
                    <time datetime="2017-05-02">May 02, 2023</time>
                  </li>
                  <li>
                    <ul class="inline-list">
                      <li>
                        <i class="icon anm anm-comments-l"></i>
                        <a href="#"> 0 bình luận</a>
                      </li>
                    </ul>
                  </li>
                </ul>
                <div class="rte">
                  <p>Thời trang theo phong cách trẻ trung năng động 2023 chính là xu hướng của những bạn trẻ hiện đại. Chúng thể hiện sự khỏe khoắn, thoải mái trong cách ăn mặc rất gọn gàng, chỉn chu, đơn giản nhưng vẫn không kém phần cuốn hút....</p>
                </div>
                <p>
                  <a href="#" class="btn btn-secondary btn--small">Đọc thêm <i class="fa fa-caret-right" aria-hidden="true"></i>
                  </a>
                </p>
              </div>
              <div class="article" style="display: block;">
                <!-- Article Image -->
                <a class="article_featured-image" href="#">
                  <img class="blur-up ls-is-cached lazyloaded" data-src="https://cdn.shortpixel.ai/spai2/w_785+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2023/01/6-set-ao-dai-tet-010123-9.jpg" src="https://cdn.shortpixel.ai/spai2/w_785+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2023/01/6-set-ao-dai-tet-010123-9.jpg" alt="How to Wear The Folds Trend Four Ways">
                </a>
                <h2 class="h3">
                  <a href="#">Tết Quý Mão mặc gì? </a>
                </h2>
                <ul class="publish-detail">
                  <li>
                    <i class="anm anm-user-al" aria-hidden="true"></i> User
                  </li>
                  <li>
                    <i class="icon anm anm-clock-r"></i>
                    <time datetime="2017-05-02">May 02, 2017</time>
                  </li>
                  <li>
                    <ul class="inline-list">
                      <li>
                        <i class="icon anm anm-comments-l"></i>
                        <a href="#"> 10 bình luận</a>
                      </li>
                    </ul>
                  </li>
                </ul>
                <div class="rte">
                  <p>Áo dài là một trong những trang phục gắn liền với ngày Tết của người Việt. Theo thời gian, tà áo dài ngày càng được cách tân và ưu ái trong các BST để trở thành nguồn cảm hứng bất tận của các thương hiệu thời trang. Vì xuất hiện trong những dịp quan trọng, tà áo dài luôn đòi hỏi sự trang trọng và yêu cầu sự trang nhã nhất....</p>
                </div>
                <p>
                  <a href="#" class="btn btn-secondary btn--small">Đọc thêm <i class="fa fa-caret-right" aria-hidden="true"></i>
                  </a>
                </p>
              </div> 
              <div class="loadmore-post">
                <a href="#;" class="btn loadMorepost">Xem thêm</a>
              </div>
            </div>
          </div>
          <!--End Main Content-->
          <!--Sidebar-->
          <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar">
            <div class="sidebar_tags">
              <category />
              <recent-post />
              <recent-comment />
              <tag-cloud />
              <trending-now />
            </div>
          </div>
          <!--End Sidebar-->
        </div>
      </div>
    </div>
    <footer id="footer" class="footer-2">
      <new-letter></new-letter>
      <page-footer></page-footer>
    </footer>
  </div>
</template>


<script>
import Category from './components/category.vue';
import RecentPost from './components/recent-post.vue';
import RecentComment from './components/recent-comment.vue';
import TagCloud from './components/tag-cloud.vue';
import TrendingNow from './components/trending-now.vue';


export default {
  name: 'BlogView',
  components: {
    Category,
    RecentPost,
    RecentComment,
    TagCloud,
    TrendingNow,
  },
  data() {
    return {}
  }
}

</script>

<style>

.search-header input{
  height: 20px !important;
}

.article_featured-image img {
  height: 400px;
  width: 100%;
  object-fit: cover;
}

</style>