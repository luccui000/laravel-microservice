<template>
  <div class="header-wrap animated d-flex border-bottom">
    <div class="container-fluid">
      <div class="row align-items-center">
        <!--Desktop Logo-->
        <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
        <router-link to="/">
          <img class="luccui-logo" src="/assets/images/logo.png" alt="MinhLuc" title="MinhLuc" />
        </router-link>
        </div>
        <!--End Desktop Logo-->
        <div class="col-2 col-sm-3 col-md-3 col-lg-8">
          <div class="d-block d-lg-none">
            <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
              <i class="icon anm anm-times-l"></i>
              <i class="anm anm-bars-r"></i>
            </button>
          </div> 
          <!--Desktop Menu-->
          <nav class="grid__item" id="AccessibleNav">
            <!-- for mobile -->
            <ul id="siteNav" class="site-nav medium center hidearrow">
              <li class="lvl1 parent megamenu">
                <router-link to="/">Trang chủ <i class="anm anm-angle-down-l"></i></router-link> 
                <div class="megamenu style1">
                  <ul class="grid mmWrapper">
                    <li class="grid__item">
                      <ul class="grid">
                        <li class="grid__item lvl-1 col-md-6 col-lg-3">
                          <router-link to="/" class="site-nav lvl-1">Trang chủ</router-link> 
                          <ul class="subLinks">
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Các thương hiệu nổi tiếng</a>
                            </li>
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Mẫu thời trang hot nhất</a>
                            </li> 
                          </ul>
                        </li>
                        <li class="grid__item lvl-1 col-md-6 col-lg-3">
                          <router-link to="/" class="site-nav lvl-1">Chủ đề</router-link>  
                          <ul class="subLinks">
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Thời trang theo chủ đề</a>
                            </li> 
                          </ul>
                        </li> 
                      </ul>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="lvl1 parent megamenu">
                <a href="#">Shop <i class="anm anm-angle-down-l"></i>
                </a>
                <div class="megamenu style4">
                  <ul class="grid grid--uniform mmWrapper">
                    <li class="grid__item lvl-1 col-md-3 col-lg-3">
                      <a href="#" class="site-nav lvl-1">Thông tin shop</a>
                      <ul class="subLinks">
                        <li class="lvl-2">
                          <router-link to="/blog" class="site-nav lvl-2">Giới thiệu</router-link>
                        </li>
                        <li class="lvl-2">
                          <a href="#" class="site-nav lvl-2">Hệ thống cửa hàng</a>
                        </li> 
                      </ul>
                    </li>
                    <li class="grid__item lvl-1 col-md-3 col-lg-3">
                      <a href="#" class="site-nav lvl-1">Dịch vụ</a>
                      <ul class="subLinks">
                        <li class="lvl-2">
                          <a href="#" class="site-nav lvl-2">
                            Yêu cầu thông tin 
                          </a>
                        </li>
                        <li class="lvl-2">
                          <a href="#" class="site-nav lvl-2">
                            Liên hệ với chúng tôi
                          </a>
                        </li>
                        <li class="lvl-2">
                          <a href="#" class="site-nav lvl-2">
                            Đặt hàng và hoàn trả
                          </a>
                        </li>
                        <li class="lvl-2">
                          <a href="#" class="site-nav lvl-2">
                            Trung tâm hỗ trợ
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="grid__item lvl-1 col-md-6 col-lg-6">
                      <a href="#">
                        <img src="/assets/images/megamenu-bg1.jpg" alt="" title="" />
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="lvl1 parent megamenu">
                <router-link to="/products">
                  Sản phẩm
                <i class="anm anm-angle-down-l"></i>
                </router-link>  
                <div class="megamenu style2">
                  <ul class="grid mmWrapper">
                    <li class="grid__item large-up--one-whole">
                      <ul class="grid">
                        <li class="grid__item lvl-1 col-md-3 col-lg-3">
                          <a href="#" class="site-nav lvl-1">Đồ nam</a>
                          <ul class="subLinks">
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">KAPPA Áo thun tay ngắn ...</a>
                            </li>
                            <li class="lvl-2">
                              <router-link to="/products/46" class="site-nav lvl-2">Kappa nam áo thun tay ...</router-link>
                            </li> 
                          </ul>
                        </li>
                        <li class="grid__item lvl-1 col-md-3 col-lg-3">
                          <a href="#" class="site-nav lvl-1">Đồ nữ</a>
                          <ul class="subLinks">
                            <li class="lvl-2">
                              <a href="" class="site-nav lvl-2">Kappa giày sneakers nữ...</a>
                            </li> 
                          </ul>
                        </li>
                        <li class="grid__item lvl-1 col-md-3 col-lg-3">
                          <a href="#" class="site-nav lvl-1">Giày dép</a>
                          <ul class="subLinks">
                            <li class="lvl-2">
                              <router-link to="/products/302" class="site-nav lvl-2">Kappa giày thể thao nam/nữ...</router-link>
                            </li>
                            <li class="lvl-2">
                              <router-link to="/products/335" class="site-nav lvl-2">Kappa giày thể thao nam/nữ...</router-link>
                            </li>
                          </ul>
                        </li>
                        <li class="grid__item lvl-1 col-md-3 col-lg-3">
                          <a href="#" class="site-nav lvl-1">Quần JEAN</a>
                          <ul class="subLinks">
                            <li class="lvl-2">
                              <router-link to="/products/237" class="site-nav lvl-2">Ecko quần JEAN <span class="lbl nm_label1">New</span>
                              </router-link>
                            </li>
                            <li class="lvl-2">
                              <router-link to="/products/227" class="site-nav lvl-2">Staple quần khakhi <span class="lbl nm_label1">New</span>
                              </router-link>
                            </li> 
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="lvl1 parent dropdown">
                <router-link to="/blog">Giới thiệu <i class="anm anm-angle-down-l"></i></router-link>
              </li> 
              <li class="lvl1">
                <a href="#">
                  <b>Mua ngay!</b>
                  <i class="anm anm-angle-down-l"></i>
                </a>
              </li>
            </ul>
          </nav>
          <!--End Desktop Menu-->
        </div>
        <!--Mobile Logo-->
        <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
          <div class="logo">
            <router-link to="/">
              <img src="/assets/images/logo.svg" alt="MinhLucShop" title="MinhLucShop" />
            </router-link> 
          </div>
        </div>
        <!--Mobile Logo-->
        <div class="col-4 col-sm-3 col-md-3 col-lg-2">
          <div class="site-cart">
            <router-link class="site-header__cart" to="/cart">
              <i class="icon anm anm-bag-l"></i>
              <span class="site-header__cart-count" @click="isShow = !isShow">
                {{  totalItem }}
              </span>
            </router-link>  
            <!--End Minicart Popup-->
          </div>
          <div class="site-header__search">
            <button type="button" class="search-trigger">
              <i class="icon anm anm-search-l"></i>
            </button>
          </div>
        </div>
      </div>
    </div> 
  </div>
</template>

<script>

export default {
  name: 'NavHeader',
  data() {
    return {
      products: [],
      isShow: false
    }
  },
  mounted() {
    this.$store.dispatch('header/getProducts')
  },
  computed: {
    totalPrice() {
      return this.products.reduce((total, curr) => total + curr.price * curr.quantity);
    },
    productData() {
      return this.$store.state.header.products || [];
    },
    cart() {
      return this.$store.state.cart.carts || {};
    },
    totalItem() {
      return this.$store.state.cart.carts?.details?.length || 0;
    }
  }
}
</script>

<style>
.luccui-logo {
	width: 200px;
}
</style>
