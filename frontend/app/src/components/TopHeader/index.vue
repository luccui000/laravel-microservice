<template>
  <div class="top-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-10 col-sm-8 col-md-5 col-lg-4">
                <div class="currency-picker">
                    <span class="selected-currency">VND</span> 
                </div>
                <div class="language-dropdown">
                    <span class="language-dd">Việt nam</span> 
                </div>
                <p class="phone-no"><i class="anm anm-phone-s"></i> 0399942301</p>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
              <div class="text-center"><p class="top-header_middle-text">TOP 3 mẫu shop thời trang đẹp hot nhất 2023</p></div>
            </div>
            <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
              <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                <ul class="customer-links list-inline" v-if="isLogin">
                  <li>
                    <router-link to="/me">{{ user.name }}</router-link>
                    <ul class="sub-customer-links">
                      <li>Test</li>
                    </ul>
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
                    <router-link to="/tracking-order">Theo dõi đơn hàng</router-link>
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