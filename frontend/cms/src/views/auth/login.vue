<template>
  <div class="main-wrapper account-wrapper">
    <div class="account-page">
      <div class="account-center">
        <div class="account-box">
          <form class="form-signin"> 
            <div class="form-group">
              <label>Email</label>
              <input v-model="user.email" type="text" autofocus="" class="form-control">
            </div>
            <div class="form-group">
              <label>Mật khẩu</label>
              <input v-model="user.password" type="password" class="form-control">
            </div>
            <div class="form-group text-right">
              <a href="#">Quên mật khẩu?</a>
            </div>
            <div class="form-group text-center">
              <button @click="login" type="button" class="btn btn-primary account-btn">Đăng nhập</button>
            </div> 
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'LoginView',
  data() {
    return {
      user: {
        email: 'minhluc@gmail.com',
        password: 'Pass@123'
      }
    };
  },
  methods: {
    login() {
      this.$store.dispatch('auth/login', { email: this.user.email, password: this.user.password})
        .then(response => {
          if(response) {
            this.$router.push({ name: 'dashboard.index' })
          }
        }) 
    }
  }
}

</script>