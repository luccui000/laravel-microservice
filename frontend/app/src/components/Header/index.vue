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
                    <li class="grid__item large-up--one-whole">
                      <ul class="grid">
                        <li class="grid__item lvl-1 col-md-3 col-lg-3">
                          <a href="#" class="site-nav lvl-1">Trang chủ 1</a>
                          <ul class="subLinks">
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Home 1 - Classic</a>
                            </li>
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Home 2 - Default</a>
                            </li>
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Home 15 - Furniture <span class="lbl nm_label1">New</span>
                              </a>
                            </li>
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Home 3 - Boxed</a>
                            </li>
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Home 4 - Fullwidth</a>
                            </li>
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Home 5 - Cosmetic</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home6-modern.html" class="site-nav lvl-2">Home 6 - Modern</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home7-shoes.html" class="site-nav lvl-2">Home 7 - Shoes</a>
                            </li>
                          </ul>
                        </li>
                        <li class="grid__item lvl-1 col-md-3 col-lg-3">
                          <a href="#" class="site-nav lvl-1">Home Group 2</a>
                          <ul class="subLinks">
                            <li class="lvl-2">
                              <a href="home8-jewellery.html" class="site-nav lvl-2">Home 8 - Jewellery</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home9-parallax.html" class="site-nav lvl-2">Home 9 - Parallax</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home10-minimal.html" class="site-nav lvl-2">Home 10 - Minimal</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home11-grid.html" class="site-nav lvl-2">Home 11 - Grid</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home12-category.html" class="site-nav lvl-2">Home 12 - Category</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home13-auto-parts.html" class="site-nav lvl-2">Home 13 - Auto Parts</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home14-bags.html" class="site-nav lvl-2">Home 14 - Bags <span class="lbl nm_label1">New</span>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="grid__item lvl-1 col-md-3 col-lg-3">
                          <a href="#" class="site-nav lvl-1">New Sections</a>
                          <ul class="subLinks">
                            <li class="lvl-2">
                              <a href="home11-grid.html" class="site-nav lvl-2">Image Gallery</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home5-cosmetic.html" class="site-nav lvl-2">Featured Product</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home7-shoes.html" class="site-nav lvl-2">Columns with Items</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home6-modern.html" class="site-nav lvl-2">Text columns with images</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home2-default.html" class="site-nav lvl-2">Products Carousel</a>
                            </li>
                            <li class="lvl-2">
                              <a href="home9-parallax.html" class="site-nav lvl-2">Parallax Banner</a>
                            </li>
                          </ul>
                        </li>
                        <li class="grid__item lvl-1 col-md-3 col-lg-3">
                          <a href="#" class="site-nav lvl-1">New Features</a>
                          <ul class="subLinks">
                            <li class="lvl-2">
                              <a href="home13-auto-parts.html" class="site-nav lvl-2">Top Information Bar <span class="lbl nm_label1">New</span>
                              </a>
                            </li>
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Age Varification <span class="lbl nm_label1">New</span>
                              </a>
                            </li>
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Footer Blocks</a>
                            </li>
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">2 New Megamenu style</a>
                            </li>
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Show Total Savings <span class="lbl nm_label3">Hot</span>
                              </a>
                            </li>
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">New Custom Icons</a>
                            </li>
                            <li class="lvl-2">
                              <a href="#" class="site-nav lvl-2">Auto Currency</a>
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
                      <a href="#" class="site-nav lvl-1">Shop Pages</a>
                      <ul class="subLinks">
                        <li class="lvl-2">
                          <a href="shop-left-sidebar.html" class="site-nav lvl-2">Left Sidebar</a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-right-sidebar.html" class="site-nav lvl-2">Right Sidebar</a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-fullwidth.html" class="site-nav lvl-2">Fullwidth</a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-grid-3.html" class="site-nav lvl-2">3 items per row</a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-grid-4.html" class="site-nav lvl-2">4 items per row</a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-grid-5.html" class="site-nav lvl-2">5 items per row</a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-grid-6.html" class="site-nav lvl-2">6 items per row</a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-grid-7.html" class="site-nav lvl-2">7 items per row</a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-listview.html" class="site-nav lvl-2">Product Listview</a>
                        </li>
                      </ul>
                    </li>
                    <li class="grid__item lvl-1 col-md-3 col-lg-3">
                      <a href="#" class="site-nav lvl-1">Shop Features</a>
                      <ul class="subLinks">
                        <li class="lvl-2">
                          <a href="shop-left-sidebar.html" class="site-nav lvl-2">Product Countdown <span class="lbl nm_label3">Hot</span>
                          </a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-right-sidebar.html" class="site-nav lvl-2">Infinite Scrolling</a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-grid-3.html" class="site-nav lvl-2">Pagination - Classic</a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-grid-6.html" class="site-nav lvl-2">Pagination - Load More</a>
                        </li>
                        <li class="lvl-2">
                          <a href="product-labels.html" class="site-nav lvl-2">Dynamic Product Labels</a>
                        </li>
                        <li class="lvl-2">
                          <a href="product-swatches-style.html" class="site-nav lvl-2">Product Swatches <span class="lbl nm_label2">Sale</span>
                          </a>
                        </li>
                        <li class="lvl-2">
                          <a href="product-hover-info.html" class="site-nav lvl-2">Product Hover Info</a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-grid-3.html" class="site-nav lvl-2">Product Reviews</a>
                        </li>
                        <li class="lvl-2">
                          <a href="shop-left-sidebar.html" class="site-nav lvl-2">Discount Label <span class="lbl nm_label1">New</span>
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
                  Sản phẩm<i class="anm anm-angle-down-l"></i>
                </router-link>  
                <div class="megamenu style2">
                  <ul class="grid mmWrapper">
                    <li class="grid__item one-whole">
                      <ul class="grid">
                        <li
                          class="grid__item lvl-1 col-md-3 col-lg-3" 
                          v-for="group in productData"
                          :key="group.id" 
                        >
                          <a href="#" class="site-nav lvl-1">{{  group.name  }}</a>
                          <ul class="subLinks">
                            <li 
                            class="lvl-2" 
                              v-for="product in group.products" 
                              :key="product.id" >
                              <router-link 
                                :to="{ name: 'products.show', params: { id: product.id } }"
                                class="site-nav lvl-2"
                                style="max-width: 200px; overflow: hidden"
                                >{{ product.name }}
                              </router-link> 
                            </li> 
                          </ul>
                        </li> 
                      </ul>
                    </li>
                    <li class="grid__item large-up--one-whole imageCol">
                      <a href="#">
                        <img src="/assets/images/megamenu-bg2.jpg" alt="">
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="lvl1 parent dropdown">
                <a href="#">Giới thiệu <i class="anm anm-angle-down-l"></i>
                </a>
                <ul class="dropdown">
                  <li>
                    <a href="cart-variant1.html" class="site-nav">Cart Page <i class="anm anm-angle-right-l"></i>
                    </a>
                    <ul class="dropdown">
                      <li>
                        <a href="cart-variant1.html" class="site-nav">Cart Variant1</a>
                      </li>
                      <li>
                        <a href="cart-variant2.html" class="site-nav">Cart Variant2</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="compare-variant1.html" class="site-nav">Compare Product <i class="anm anm-angle-right-l"></i>
                    </a>
                    <ul class="dropdown">
                      <li>
                        <a href="compare-variant1.html" class="site-nav">Compare Variant1</a>
                      </li>
                      <li>
                        <a href="compare-variant2.html" class="site-nav">Compare Variant2</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="checkout.html" class="site-nav">Checkout</a>
                  </li>
                  <li>
                    <a href="about-us.html" class="site-nav">About Us <span class="lbl nm_label1">New</span>
                    </a>
                  </li>
                  <li>
                    <a href="contact-us.html" class="site-nav">Contact Us</a>
                  </li>
                  <li>
                    <a href="faqs.html" class="site-nav">FAQs</a>
                  </li>
                  <li>
                    <a href="lookbook1.html" class="site-nav">Lookbook <i class="anm anm-angle-right-l"></i>
                    </a>
                    <ul>
                      <li>
                        <a href="lookbook1.html" class="site-nav">Style 1</a>
                      </li>
                      <li>
                        <a href="lookbook2.html" class="site-nav">Style 2</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="404.html" class="site-nav">404</a>
                  </li>
                  <li>
                    <a href="coming-soon.html" class="site-nav">Coming soon <span class="lbl nm_label1">New</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="lvl1 parent dropdown">
                <a href="#">Blog <i class="anm anm-angle-down-l"></i>
                </a>
                <ul class="dropdown">
                  <li>
                    <a href="blog-left-sidebar.html" class="site-nav">Left Sidebar</a>
                  </li>
                  <li>
                    <a href="blog-right-sidebar.html" class="site-nav">Right Sidebar</a>
                  </li>
                  <li>
                    <a href="blog-fullwidth.html" class="site-nav">Fullwidth</a>
                  </li>
                  <li>
                    <a href="blog-grid-view.html" class="site-nav">Gridview</a>
                  </li>
                  <li>
                    <a href="blog-article.html" class="site-nav">Article</a>
                  </li>
                </ul>
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
                {{  cart && cart.details ? cart.details.length : 0 }}
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
    }
  }
}
</script>

<style>
.luccui-logo {
	width: 200px;
}
</style>
