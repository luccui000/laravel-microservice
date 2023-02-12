<template>
  <div>
    <div class="page section-header text-center">
			<div class="page-title">
        <div class="wrapper"><h1 class="page-width">Đăng nhập tài khoản</h1></div>
      </div>
		</div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
          <div class="mb-4">
            <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="CustomerEmail">Email</label>
                  <input v-model="email" type="email" value="minhluc@gmail.com" placeholder="Email" class="" autocorrect="off" autocapitalize="off" autofocus="">
                </div>
              </div>
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                      <label for="CustomerPassword">Mật khẩu</label>
                      <input v-model="password" type="password" value="Pass@123" placeholder="" class="">                        	
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                  <button @click="login" class="btn mb-3" >Đăng nhập</button>
                  <p class="mb-4">
                    <router-link to="/forgot-password" >Quên mật khẩu ?</router-link> &nbsp; | &nbsp;
                    <router-link to="/register" id="customer_register_link">Đăng ký tài khoản</router-link>
                  </p>
              </div>
            </div>
          </div>
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
      email: 'customer@minhluc.com',
      password: 'Pass@123'
    }
  },
  methods: {
    login() { 
      this.$store.dispatch('auth/login', {
        email: this.email, 
        password: this.password
      }).then(() => { 
        this.$router.go('/')
      }).catch(error => { 
        if(error) {
          this.$notify({
            group: 'alert',
            title: 'Thất bại',
            text: error.response.data?.message,
            type: 'error'
          })
        }
      })
    }
  }
}

</script>