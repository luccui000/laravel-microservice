<template>
  <div>
    <div id="page-content">
      <banner
        :image="banner.image"
        :title="banner.title"
      />
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
            <sidebar></sidebar>
          </div>
          <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col"> 
            <div class="toolbar">
              <div class="filters-toolbar-wrapper">
                <div class="row">
                  <div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">
                    <div @click="setView" title="Grid View" class="change-view" :class="{ 'change-view--active' : isGridView }">
                      <img src="assets/images/grid.jpg" alt="Grid" />
                    </div>
                    <div @click="setView" title="List View" class="change-view" :class="{ 'change-view--active' : !isGridView }">
                      <img src="assets/images/list.jpg" alt="List" />
                    </div>
                  </div>
                  <div class="col-4 col-md-4 col-lg-4 text-center d-flex show-item filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center"> 
                    <div>
                      <label for="SortBy" class="show-label">Hiển thị</label> 
                    </div>
                    <div>
                      <select v-model="showItem" name="SortBy" class="filters-toolbar__input filters-toolbar__input--sort">
                        <option value="16" selected="selected">16</option>
                        <option value="32">32</option>
                        <option value="48">48</option>
                        <option value="96">98</option> 
                      </select>
                    </div>
                  </div>
                  <div class="col-4 col-md-4 col-lg-4 text-right">
                    <div class="filters-toolbar__item">
                      <label for="SortBy" class="hidden">Sort</label>
                      <select name="SortBy" class="filters-toolbar__input filters-toolbar__input--sort">
                        <option value="0" selected="selected">Lọc theo</option>
                        <option value="1">Bán chạy nhất</option>
                        <option value="2">Chữ cái, A-Z</option>
                        <option value="3">Chữ cái, Z-A</option>
                        <option value="4">Giá, thấp đến cao</option>
                        <option value="5" >Giá, cao xuống thấp</option>
                        <option value="6">Ngày, Mới nhất</option>
                        <option value="7">Ngày, cũ nhất</option>
                      </select>
                      <input class="collection-header__default-sort" type="hidden" value="manual">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <product-grid-view 
              v-if="isGridView"
              :products="products"
            ></product-grid-view>
            <product-list-view 
              v-else
              :products="products"
            ></product-list-view>
          </div>
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
import Banner from '@/components/Banner';
import PageFooter from '@/components/Footer';
import NewLetter from "@/components/NewLetter";
import Sidebar from '@/views/Products/components/side-left.vue'; 
import ProductGridView from '@/views/Products/components/product-gridview.vue';
import ProductListView from '@/views/Products/components/product-listview.vue';

export default {
  name: 'ViewProducts',
  components: {
    Banner,
    Sidebar, 
    NewLetter,
    PageFooter,
    ProductGridView,
    ProductListView,
  },
  data() {
    return {
      isGridView: true, 
      product: null,
      banner: {
        image: {
          dataSrc: '',
          src: 'assets/images/cat-women1.jpg'
        },
        title: 'Danh sách sản phẩm'
      },
      showItem: 16
    }
  },
  mounted() {
    this.getAllProduct();
  },
  methods: {
    getAllProduct() {
      this.$store.dispatch('product/getAllProduct');
    },
    setView() {
      this.isGridView = !this.isGridView;
    }
  },
  computed: {
    products() {
      return this.$store.state.product.products;
    }
  },
  watch: {
    showItem: {
      handler(newValue) { 
        this.$store.commit('product/SET_PER_PAGE', newValue);
        this.$store.dispatch('product/getAllProduct');
      }
    }
  }
}
</script>

<style scoped>
.filters-toolbar__item select {
  border: 1px solid #ddd;
}

.show-item {
  display: flex;
  justify-content: center;
}

.show-label {
  width: 80px;
}
</style>
