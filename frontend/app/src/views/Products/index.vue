<template>
  <div>
    <div id="page-content">
      <banner></banner>
      <div class="container">
        <div class="row">
          <sidebar></sidebar>
          <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
            <div class="productList">
              <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
              <toolbar></toolbar>
              <product-list></product-list>
            </div>
            <div class="infinitpaginOuter">
              <div class="infinitpagin">
                <a href="#" class="btn loadMore">Load More</a>
              </div>
            </div>
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
import Sidebar from '@/components/Sidebar';
import Toolbar from '@/components/Toolbar';
import ProductList from '@/views/Products/list';
import NewLetter from "@/components/NewLetter";
import PageFooter from '@/components/Footer';

export default {
  name: 'ViewProducts',
  components: {
    Banner,
    Sidebar,
    Toolbar,
    ProductList,
    NewLetter,
    PageFooter
  }
}
</script>