<template>
  <div class="section logo-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <div class="section-header text-center">
            <h2 class="h2">Top thương hiệu được yêu thích nhất</h2>
          </div>
          <div class="logo-bar d-flex justify-content-center">
            <div 
              class="logo-bar__item"
              v-for="brand in brands"
              :key="brand"
            >
              <img :src="brand" alt="" title="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import { TOP_BRANDS } from '@/config/constants';

export default {
  name: 'MostLovedBrands',
  data() {
    return {
      brands: TOP_BRANDS
    }
  }
}

</script>