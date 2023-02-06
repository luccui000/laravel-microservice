<template>
  <div>
    <!--Page Title-->
    <div class="page section-header text-center">
      <div class="page-title">
        <div class="wrapper">
          <h1 class="page-width">Đăng ký tài khoản</h1>
        </div>
      </div>
    </div>
    <!--End Page Title-->
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
          <div class="mb-4">
              <validation-observer v-slot="{ handleSubmit }"> 
                <form @submit.prevent="handleSubmit(onSubmit)" class="contact-form">
                  <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <validation-provider name="họ" rules="required|min:2|max:50" v-slot="{ errors }">
                        <div class="form-group">
                        <label for="FirstName">Họ <span class="text-danger">*</span></label>
                          <input type="text" v-model="account.first_name" placeholder="" id="FirstName" autofocus="">
                        </div>
                        <span class="text-danger">{{ errors[0]}}</span>
                      </validation-provider>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <validation-provider name="tên" rules="required|min:2|max:50" v-slot="{ errors }">
                          <label for="LastName">Tên <span class="text-danger">*</span>
                          </label>
                          <input type="text" v-model="account.last_name" placeholder="" id="LastName">
                          <span class="text-danger">{{ errors[0]}}</span>
                        </validation-provider>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <validation-provider name="email" rules="email" v-slot="{ errors }">
                          <label for="CustomerEmail">Email </label>
                          <input type="email" v-model="account.email" placeholder="" id="CustomerEmail" class="" autocorrect="off" autocapitalize="off" autofocus="">
                          <span class="text-danger">{{ errors[0]}}</span>
                        </validation-provider>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <validation-provider name="số điện thoại" rules="required" v-slot="{ errors }">
                          <label for="CustomPhone">Số điện thoại <span class="text-danger">*</span></label>
                          <input type="text" v-model="account.phone" id="CustomPhone" class="" autocorrect="off" autocapitalize="off" autofocus="">
                          <span class="text-danger">{{ errors[0]}}</span>
                        </validation-provider>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <validation-provider name="Mật khẩu" rules="required" v-slot="{ errors }">
                          <label for="CustomerPassword">Mật khẩu <span class="text-danger">*</span></label>
                          <input type="password" v-model="account.password" name="customer[password]" placeholder="" id="CustomerPassword" class="">
                          <span class="text-danger">{{ errors[0]}}</span>
                        </validation-provider>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                      <button class="btn mb-3 btn-register">Đăng ký</button>
                    </div>
                  </div>
                </form> 
              </validation-observer>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script> 

export default {
  name: 'RegisterView',
  data() {
    return {
      account: {
        first_name: '',
        last_name: '',
        phone: '',
        email: '',
        password: ''
      }
    }
  },
  methods: {
    onSubmit() { 
      try {
        this.$store.dispatch('auth/register', this.account) 
      } catch (error ){
        console.log(error)
      }
    }
  }
}

</script>

<style>

.btn-register {
  width: 100%;
  margin-top: 10px;
}

</style>