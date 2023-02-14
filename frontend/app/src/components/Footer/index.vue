<template>
  <div class="site-footer">
    <div class="container">
      <!--Footer Links-->
      <div class="footer-top">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
            <h4 class="h4">Truy cập nhanh</h4>
            <ul>
              <li>
                <a href="#">Trang chủ</a>
              </li>
              <li>
                <a href="#">Cửa hàng</a>
              </li>
              <li>
                <a href="#">Sản phẩm</a>
              </li>
              <li>
                <a href="#">Giới thiệu</a>
              </li>
              <li>
                <a href="#">Blog</a>
              </li>
            </ul>
          </div>
          <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
            <h4 class="h4">Thông tin</h4>
            <ul>
              <li>
                <a href="#">Về chúng tôi</a>
              </li>
              <li>
                <a href="#">Tuyển dụng</a>
              </li>
              <li>
                <a href="#">Điều khoản</a>
              </li>
              <li>
                <a href="#">Chính sách</a>
              </li>
              <li>
                <router-link to="/me">Tài khoản của tôi</router-link> 
              </li>
            </ul>
          </div>
          <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
            <h4 class="h4">Dịch vụ khách hàng</h4>
            <ul>
              <li>
                <a href="#">Yêu cầu thông tin</a>
              </li>
              <li>
                <a href="#">FAQ's</a>
              </li>
              <li>
                <a href="#">Liên hệ với chúng tôi</a>
              </li>
              <li>
                <a href="#">Đặt hàng và hoàn trả</a>
              </li>
              <li>
                <a href="#">Trung tâm hỗ trợ</a>
              </li>
            </ul>
          </div>
          <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
            <h4 class="h4">Liên hệ chúng tôi</h4>
            <ul class="addressFooter">
              <li>
                <i class="icon anm anm-map-marker-al"></i>
                <p>129 Nguyễn Thiện Thành, <br>TP Trà Vinh </p>
              </li>
              <li class="phone">
                <i class="icon anm anm-phone-s"></i>
                <p>0399942301</p>
              </li>
              <li class="email">
                <i class="icon anm anm-envelope-l"></i>
                <p>cskh@minhluc.com</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--End Footer Links-->
      <hr> 
    </div>
  </div>
</template>

<script>

export default {
  name: 'PageFooter'
}
</script>