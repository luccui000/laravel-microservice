<template>
  <div>
    <div id="page-content">
      <div id="MainContent" class="main-content" role="main">
        <breadcrumb></breadcrumb>
        <div class="product-template__container prstyle1 container">
          <product-single></product-single>
          <product-feature></product-feature>
          <product-tab></product-tab>
          <related-product></related-product>
          <recently-viewed></recently-viewed>
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
import Breadcrumb from "@/components/Breadcrumb";
import ProductFeature from "@/components/Feature";
import ProductTab from "@/components/ProductTab";
import ProductSingle from "@/views/ProductDetail/single";
import RelatedProduct from "@/components/RelatedProduct";
import RecentlyViewed from "@/components/RecentlyViewed";
import NewLetter from "@/components/NewLetter";
import PageFooter from "@/components/Footer";

export default {
  name: 'ProductDetail',
  components: {
    RecentlyViewed,
    RelatedProduct,
    ProductSingle,
    ProductFeature,
    Breadcrumb,
    ProductTab,
    NewLetter,
    PageFooter,
  },
  data() {
    return {}
  }
}
</script>

<style scoped>

</style>