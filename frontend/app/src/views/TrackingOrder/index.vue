<template>
  <div>
    <div class="page section-header text-center">
			<div class="page-title">
        <div class="wrapper">
          <h1 class="page-width">Theo dõi đơn hàng</h1>
        </div>
      </div> 
		</div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
          <div class="mb-4">
            <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="CustomerEmail">Số điện thoại</label>
                  <input v-model="phone" type="text" placeholder="Nhập vào số điện thoại" >
                </div>
                <button class="btn">Kiểm tra</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer id="footer" class="footer-2">
      <new-letter></new-letter>
      <page-footer></page-footer>
    </footer>
  </div>
</template>

<script>

export default {
  name: 'TrackingOrderView',
  data() {
    return {
      phone: ''
    }
  }
}

</script>