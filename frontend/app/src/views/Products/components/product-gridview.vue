<template>
  <div class="grid-products grid--view-items">
    <div class="row">
      <product-gridview-item 
        v-for="product in products"
        :key="product.id"
        :product="product"
        @quick-view="selectProduct"
      ></product-gridview-item>
    </div>
    <quick-view 
      :product="product" 
      :isShow="isShow" 
      @close="closeQuickView"
    />
    <div class="infinitpaginOuter">
      <div class="infinitpagin">
        <a href="#" class="btn loadMore">Load More</a>
      </div>
    </div>
  </div>
</template>

<script>
import ProductGridviewItem from '@/views/Products/components/product-gridview-item.vue';
import QuickView from '@/views/Products/components/quick-view.vue';

export default {
  name: 'ProductGridView',
  props: ['products'],
  components: {
    ProductGridviewItem,
    QuickView
  },
  data() {
    return { 
      product: null,
      isShow: false
    }
  },
  mounted() {
    this.getAllProduct();
  },
  methods: { 
    selectProduct(product) {
      this.isShow = true;
      this.product = product;
    },
    closeQuickView(isShow) {
      this.isShow = isShow;
    }
  }
}
</script>