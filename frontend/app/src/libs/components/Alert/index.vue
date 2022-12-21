<template>
  <div class="alert text-uppercase" :class="`alert-${type}`" role="alert">
    <slot />
  </div>
</template>

<script> 

export default {
  name: 'LAlert',
  props: {
    type: {
      type: String,
      default: 'success'
    }
  }
}
</script>
