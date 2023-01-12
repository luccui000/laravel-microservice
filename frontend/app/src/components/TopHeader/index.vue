<template>
  <div class="top-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-10 col-sm-8 col-md-5 col-lg-4">
                <div class="currency-picker">
                    <span class="selected-currency">USD</span>
                    <ul id="currencies">
                        <li data-currency="INR" class="">INR</li>
                        <li data-currency="GBP" class="">GBP</li> 
                    </ul>
                </div>
                <div class="language-dropdown">
                    <span class="language-dd">English</span>
                    <ul id="language">
                      <li class="">German</li>
                      <li class="">French</li>
                    </ul>
                </div>
                <p class="phone-no"><i class="anm anm-phone-s"></i> 0399942301</p>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
              <div class="text-center"><p class="top-header_middle-text"> Worldwide Express Shipping</p></div>
            </div>
            <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
              <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                <ul class="customer-links list-inline" v-if="isLogin">
                  <li>
                    <router-link to="/">{{ user.name }}</router-link>
                  </li>
                </ul>
                <ul class="customer-links list-inline" v-else>
                  <li>
                    <router-link to="/login">Đăng nhập</router-link>
                  </li>
                  <li>
                    <router-link to="/register">Tạo tài khoản</router-link>
                  </li>
                  <li>
                    <router-link to="/wishlist">Danh sách yêu thích</router-link>
                  </li> 
                </ul>
            </div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
  name: 'TopHeader',
  data() {
    return {};
  },
  computed: {
    isLogin() {
      return this.$store.getters['auth/isLogin'];
    },
    user() {
      return this.$store.getters['auth/user'];
    }
  }
}
</script>