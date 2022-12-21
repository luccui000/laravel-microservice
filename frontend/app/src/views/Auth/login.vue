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
              <form method="post" action="#" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                          <label for="CustomerEmail">Email</label>
                          <input type="email" name="customer[email]" placeholder="" id="CustomerEmail" class="" autocorrect="off" autocapitalize="off" autofocus="">
                      </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                          <label for="CustomerPassword">Mật khẩu</label>
                          <input type="password" value="" name="customer[password]" placeholder="" id="CustomerPassword" class="">                        	
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="submit" class="btn mb-3" value="Đăng nhập">
                      <p class="mb-4">
                        <router-link to="/forgot-password" id="RecoverPassword">Quên mật khẩu ?</router-link> &nbsp; | &nbsp;
                        <router-link to="/register" id="customer_register_link">Đăng ký tài khoản</router-link>
                      </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'LoginView'
}

</script>