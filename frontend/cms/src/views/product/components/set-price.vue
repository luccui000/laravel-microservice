<template>
  <el-card class="mt-3"> 
    <ul>
      <li v-for="sku, index in skus" :key="sku" class="d-flex my-2">
        <span class="my-2" style="width: 100px">{{ sku }}</span>
        <el-input
          v-model="prices[index]"
          size="medium"
          style="width: 400px"
        ></el-input>
      </li>
    </ul>
  </el-card>
</template>


<script>

export default {
  name: 'SetPriceComponent',
  props: ['colors', 'sizes', 'pricesUpdate'],
  data() {
    return { 
      prices: []
    }
  },
  mounted() {
    console.log(this.$props)
  },
  computed: {
    skus() {
      let items = [];
      for(let color of this.colors) {
        for(let size of this.sizes) {
          items.push(`${color}/${size}`);
        }
      }
      return items;
    }
  },
  watch: {
    prices: function (value){
      this.$emit('update-price', value);
    }
  }
}

</script>