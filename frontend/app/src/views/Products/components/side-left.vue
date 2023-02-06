<template>
  <div>
    <div class="closeFilter d-block d-md-none d-lg-none">
      <i class="icon icon anm anm-times-l"></i>
    </div>
    <div class="sidebar_tags">
      <!--Categories-->
      <div class="sidebar_widget categories filter-widget">
        <div class="widget-title">
          <h2>Danh mục</h2>
        </div>
        <div class="widget-content">
          <ul class="sidebar_categories" v-if="categories"> 
            <li 
              class="lvl-1"
              v-for="category in categories"
              :key="category.id"
            >
              <span @click="setCategory(category)" class="site-nav">{{ category.name }}</span>
            </li>
          </ul>
        </div>
      </div>
      <!--Categories-->
      <!--Price Filter-->
      <div class="sidebar_widget filterBox filter-widget">
        <div class="widget-title">
          <h2>Theo mức giá</h2>
        </div>
        <div class="price-filter">
          <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
          </div>
          <div class="row">
            <div class="col-4">
              <p class="no-margin">
                <input v-model="price.from" type="text">
              </p>
            </div>
            <div class="col-4 text-right margin-25px-top">
              <input v-model="price.to" type="text">
            </div>
            <div class="col-4 text-right margin-25px-top"> 
              <button @click="setPrice" type="button" class="btn btn-secondary btn--small">Lọc</button>
            </div>
          </div>
        </div>
      </div>
      <!--End Price Filter-->
      <!--Size Swatches-->
      <div class="sidebar_widget filterBox filter-widget size-swacthes" v-if="sizes">
        <div class="widget-title">
          <h2>Kích cỡ</h2>
        </div>
        <div class="filter-color swacth-list">
          <ul>
            <li 
              v-for="size in sizes" 
              :key="size.id"
              @click="setSize(size)"
            >
              <span class="swacth-btn">{{ size.name }}</span>
            </li> 
          </ul>
        </div>
      </div>
      <!--End Size Swatches-->
      <!--Color Swatches-->
      <div class="sidebar_widget filterBox filter-widget" v-if="colors"> 
        <div class="widget-title">
          <h2>Màu sắc</h2>
        </div>
        <div class="filter-color swacth-list clearfix">
          <span  
            v-for="color in colors"
            :key="color.id"
            :class="`swacth-btn ${color.name}`"
            @click="setColor(color)"
          ></span> 
        </div>
      </div>
      <!--End Color Swatches-->
      <!--Brand-->
      <div class="sidebar_widget filterBox filter-widget" v-if="brands">
        <div class="widget-title">
          <h2>Thương hiệu</h2>
        </div>
        <ul>
          <li 
            v-for="brand in brands"
            :key="brand.id" 
            >
            <input type="checkbox" v-model="brandIds" :value="brand.id" :id="`check-${brand.id}`">
            <label :for="`check-${brand.id}`">
              <span> 
              </span>{{ brand.name }}</label>
          </li> 
        </ul>
      </div>
      <div class="d-flex mb-4 justify-content-end"> 
        <button @click="resetFilter" class="btn">Xóa bộ lọc</button>
      </div>
      <!--End Brand-->
      <!--Popular Products-->
      <div class="sidebar_widget">
        <div class="widget-title">
          <h2>Popular Products</h2>
        </div>
        <div class="widget-content">
          <div class="list list-sidebar-products">
            <div class="grid">
              <div class="grid__item">
                <div class="mini-list-item">
                  <div class="mini-view_image">
                    <a class="grid-view-item__link" href="#">
                      <img class="grid-view-item__image" src="assets/images/product-images/mini-product-img.jpg" alt="" />
                    </a>
                  </div>
                  <div class="details">
                    <a class="grid-view-item__title" href="#">Cena Skirt</a>
                    <div class="grid-view-item__meta">
                      <span class="product-price__price">
                        <span class="money">$173.60</span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="grid__item">
                <div class="mini-list-item">
                  <div class="mini-view_image">
                    <a class="grid-view-item__link" href="#">
                      <img class="grid-view-item__image" src="assets/images/product-images/mini-product-img1.jpg" alt="" />
                    </a>
                  </div>
                  <div class="details">
                    <a class="grid-view-item__title" href="#">Block Button Up</a>
                    <div class="grid-view-item__meta">
                      <span class="product-price__price">
                        <span class="money">$378.00</span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="grid__item">
                <div class="mini-list-item">
                  <div class="mini-view_image">
                    <a class="grid-view-item__link" href="#">
                      <img class="grid-view-item__image" src="assets/images/product-images/mini-product-img2.jpg" alt="" />
                    </a>
                  </div>
                  <div class="details">
                    <a class="grid-view-item__title" href="#">Balda Button Pant</a>
                    <div class="grid-view-item__meta">
                      <span class="product-price__price">
                        <span class="money">$278.60</span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="grid__item">
                <div class="mini-list-item">
                  <div class="mini-view_image">
                    <a class="grid-view-item__link" href="#">
                      <img class="grid-view-item__image" src="assets/images/product-images/mini-product-img3.jpg" alt="" />
                    </a>
                  </div>
                  <div class="details">
                    <a class="grid-view-item__title" href="#">Border Dress in Black/Silver</a>
                    <div class="grid-view-item__meta">
                      <span class="product-price__price">
                        <span class="money">$228.00</span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
      <!--Banner-->
      <!--Information-->
      <div class="sidebar_widget">
        <div class="widget-title">
          <h2>Information</h2>
        </div>
        <div class="widget-content">
          <p>Sử dụng văn bản này để chia sẻ thông tin về thương hiệu của bạn với khách hàng. </p>
        </div>
      </div>
      <!--end Information-->
      <!--Product Tags-->
      <div class="sidebar_widget">
        <div class="widget-title">
          <h2>Product Tags</h2>
        </div>
        <div class="widget-content">
          <ul class="product-tags">
            <li>
              <a href="#" title="Show products matching tag $100 - $400">$100 - $400</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag $400 - $600">$400 - $600</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag $600 - $800">$600 - $800</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Above $800">Above $800</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Allen Vela">Allen Vela</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Black">Black</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Blue">Blue</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Cantitate">Cantitate</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Famiza">Famiza</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Gray">Gray</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Green">Green</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Hot">Hot</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag jean shop">jean shop</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag jesse kamm">jesse kamm</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag L">L</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Lardini">Lardini</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag lareida">lareida</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Lirisla">Lirisla</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag M">M</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag mini-dress">mini-dress</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Monark">Monark</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Navy">Navy</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag new">new</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag new arrivals">new arrivals</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Orange">Orange</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag oxford">oxford</a>
            </li>
            <li>
              <a href="#" title="Show products matching tag Oxymat">Oxymat</a>
            </li>
          </ul>
          <span class="btn btn--small btnview">View all</span>
        </div>
      </div> 
      <!--end Product Tags-->
    </div>
  </div>  
</template>


<script>

export default {
  name: 'ProductSidebar',
  data() {
    return {
      filter: {
        category_id: null,
        size_id: 0,
      },
      price: {
        from: 0,
        to: 10000000
      },
      brandIds: []
    }
  },
  mounted() {
    this.$store.dispatch('category/getAll')
    this.$store.dispatch('product/getAttributes')
  },
  computed: {
    categories() {
      return this.$store.state.category.categories;
    },
    sizes() {
      return this.$store.state.product.sizes;
    },
    colors() {
      return this.$store.state.product.colors.map(el => {
        el.name = el.name.toLowerCase();
        return el;
      });
    },
    tags() {
      return this.$store.state.product.tags;
    },
    brands() {
      return this.$store.state.product.brands;
    },
  },
  methods: {
    setCategory(cate) {
      this.filter.category_id = cate.id;
      this.$store.commit('product/SET_CATEGORY', cate.id)
      this.$store.dispatch('product/getAllProduct')
    },
    setColor(color) {
      this.$store.commit('product/SET_COLOR', color.id)
      this.$store.dispatch('product/getAllProduct')
    },
    setSize(size) {
      this.$store.commit('product/SET_SIZE', size.id)
      this.$store.dispatch('product/getAllProduct')
    },
    setPrice() {
      this.$store.commit('product/SET_PRICE', this.price)
      this.$store.dispatch('product/getAllProduct')
    },
    resetFilter() {
      this.$store.commit('product/RESET_FILTER');
      this.$store.dispatch('product/getAllProduct')
    }
  },
  watch: {
    brandIds: {
      handler(value) {
        this.$store.commit('product/SET_BRAND', value)
        this.$store.dispatch('product/getAllProduct')
      }
    },
  }
}
</script>

<style>

.site-nav {
  cursor: pointer;
}

</style>