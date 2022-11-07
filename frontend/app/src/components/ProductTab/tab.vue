<template>
  <div v-show="isActive" class="tab-content">
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: 'ProductTab',
  data() {
    return {
      isActive: false,
    }
  },
  props: {
    name: {
      required: true
    },
    selected: {
      default: false
    }
  },
  computed: {
    href() {
      return '#' + this.name.toLowerCase().replace(/ /g, '-');
    }
  },

  mounted() {
    this.isActive = this.selected;
  }
}
</script>

<style scoped>

</style>