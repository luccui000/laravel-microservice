<template>
  <div class="collection-header">
    <div class="collection-hero">
      <div class="collection-hero__image">
        <img class="lazyload" :data-src="image.dataSource" :src="image.src" alt="Women" title="Women" />
      </div>
      <div class="collection-hero__title-wrapper">
        <h1 class="collection-hero__title page-width">
          {{ title }}
        </h1>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ProductBanner',
  props: ['image', 'title'],
}
</script>

<style scoped>
.collection-header {
  margin-bottom: 40px;
}
</style>