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
    <hr class="clear" />  
    <div class="pagination" v-if="links">
      <ul>
        <li 
          class="paginate-item"
          v-for="link in links"
          :class="{ 'active': link.active }"
          :key="link.label"
        >
          <a @click="setPage(link.label)" class="link-btn" >{{ link.label }}</a>
        </li>  
      </ul>
    </div>
  </div>
</template>

<script>
import ProductGridviewItem from '@/views/Products/components/product-gridview-item.vue';
import QuickView from '@/components/QuickView/index.vue';

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
  },
  methods: { 
    selectProduct(product) {
      this.isShow = true;
      this.product = product;
    },
    closeQuickView(isShow) {
      this.isShow = isShow;
    },
    setPage(page) {
      console.log(page)
      if(page != '...') {
        this.$store.dispatch('product/getAllProduct', page);
      }
    }
  },
  computed: {
    paginate() {
      return this.$store.state.product.data;
    },
    links() {
      const data = this.$store.state.product.data;
      return data?.links.filter((el, idx) => idx !== 0 && idx != data.links.length - 1)
    }
  }
}
</script>

<style>

.paginate-item {
  margin: 0 5px;
}

.link-btn {
  cursor: pointer;
}

</style>