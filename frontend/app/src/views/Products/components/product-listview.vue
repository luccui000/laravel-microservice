<template>
  <div class="list-view-items grid--view-items">
    <product-listview-item
      v-for="product in products"
      :key="product.id"
      :product="product"
      @quick-view="selectProduct"
    >
    </product-listview-item>
  </div>
</template>

<script>
import ProductListviewItem from './product-listview-item.vue';

export default {
  name: 'ProductListView',
  props: ['products'],
  components: {
    ProductListviewItem
  },
  data() {
    return { 
    }
  },
  mounted() { 
  },
  methods: { 
    selectProduct() {

    }
  }
}

</script>