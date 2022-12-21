<template>
  <div class="card mb-2">
    <div class="card-header" @click="isOpen = !isOpen">
      <a class="card-link">{{ title }}</a>
    </div>
    <div v-show="isOpen">
      <div class="card-body">
        <slot />
      </div>
    </div>
  </div>  
</template>

<script>

export default {
  name: 'LDropdownContent',
  props: {
    title: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      isOpen: false
    }
  },
}

</script>

<style scoped>
.card-header {
  cursor: pointer;
}
</style>