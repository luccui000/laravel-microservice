<template>
  <div>
    {{ sku }}
      <el-input
      v-model="price"
      size="medium"
    ></el-input>
  </div>
</template>

<script>

export default {
  name: 'SetPriceItem',
  props: ['price'],
  data() {
    return {}
  }
}

</script>