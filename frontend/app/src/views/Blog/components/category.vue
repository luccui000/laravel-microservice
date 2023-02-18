<template>
  <div class="sidebar_widget categories">
    <div class="widget-title">
      <h2>Danh mục</h2>
    </div>
    <div class="widget-content">
      <ul class="sidebar_categories">
        <li class="lvl-1 ">
          <a href="#" class="site-nav lvl-1">Thời trang nam</a>
        </li>
        <li class="lvl-1  active">
          <a href="#" class="site-nav lvl-1">Thời trang nữ</a>
        </li>
        <li class="lvl-1 ">
          <a href="#" class="site-nav lvl-1">Bộ sưu tập</a>
        </li>
        <li class="lvl-1 ">
          <a href="#" class="site-nav lvl-1">Trend</a>
        </li> 
      </ul>
    </div>
  </div>
</template>

<script>

export default {
  name: 'CategoryComponent',
  computed: {
    // categories() {
    //   // return this.$store.state.products.
    // }
  }
}

</script>