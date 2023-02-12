<template>
  <div>
    <!--Page Title-->
    <div class="page section-header text-center">
      <div class="page-title">
        <div class="wrapper">
          <h1 class="page-width">Xác thực tài khoản</h1>
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
                      <validation-provider name="họ" rules="required|min:6|max:6" v-slot="{ errors }">
                        <div class="form-group">
                        <label for="code">Nhập vào mã <span class="text-danger">*</span></label>
                          <input type="text" v-model="code" placeholder="" id="code" autofocus="">
                        </div>
                        <span class="text-danger">{{ errors[0]}}</span>
                      </validation-provider>
                    </div>
                    </div>
                  <div class="row">
                    <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                      <button class="btn mb-3 btn-register">Xác thực</button>
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
  name: 'UserVerifyView',
  data() {
    return {
      code: ''
    }
  },
  methods: {
    onSubmit() { 
      try {
        this.$store.dispatch('auth/verify', this.code)
          .then(() => {
            this.$notify({
                group: 'alert',
                title: 'Thành công',
                text: 'Xác thực thành công',
                type: 'success'
              })
            setTimeout(() => {
              this.$router.push('/login');
            }, 1000)
          }).catch(error => {
            console.log(error)
            if(error.response.status === 400) {
              this.$notify({
                group: 'alert',
                title: 'Thất bại',
                text: 'Mã xác thực không hợp lệ',
                type: 'error'
              })
            }
          })
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