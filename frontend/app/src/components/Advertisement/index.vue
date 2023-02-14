<template>
  <div class="section">
    <div class="hero hero--large hero__overlay bg-size">
      <img class="bg-img" :src="banner" alt="" />
      <div class="hero__inner">
        <div class="container">
          <div class="wrap-text left text-small font-bold">
            <h2 class="h2 mega-title">Belle <br> Lựa chọn tuyệt vời trong bộ sưu tập năm nay </h2>
            <div class="rte-setting mega-subtitle">Đây là phong cách thiết kế shop quần áo được ưa chuộng nhất năm 2020 vì sự trẻ trung cùng cảm giác sang trọng, thời thượng mà nó đem lại. Sự đơn giản trong phong cách thiết kế nội thất đang ngày càng được các chủ shop thời trang ưa chuộng bởi nó phù hợp với xu thế và sở thích của khách hàng.</div> 
            <router-link to="/products" class="btn">Đi đên mua sắm ngay</router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { IMAGE_BANNER } from '@/config/constants'

export default {
  name: 'HomeAdvertisement',
  data() {
    return {
      banner: IMAGE_BANNER
    }
  }
}

</script>