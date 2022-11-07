<template>
  <tabs>
    <tab name="Product Details" :selected="true">
      1
    </tab>
    <tab name="Product Reviews">
      2
    </tab>
    <tab name="Size Chart">
      3
    </tab>
    <tab name="Shipping &amp; Returns">
      4
    </tab>
  </tabs>
</template>

<script>
import Tabs from '@/components/ProductTab/tabs';
import Tab from '@/components/ProductTab/tab';

export default {
  name: 'ProductTab',
  components: {
    Tabs,
    Tab
  }
}
</script>

<style scoped>

</style>