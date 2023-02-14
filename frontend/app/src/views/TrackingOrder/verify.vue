<template>
  <div>
    <div class="page section-header text-center">
			<div class="page-title">
        <div class="wrapper">
          <h1 class="page-width">Nhập mã xác nhận</h1>
        </div>
      </div> 
		</div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
          <div class="mb-4">
            <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <label for="CustomerEmail">Nhập vào mã xác nhận vừa gửi đến số điện thoại</label>
                <div class="form-group">
                  <input v-model="phone1" type="number" class="phone" maxlength="1" min="1" placeholder="0" >
                  <input v-model="phone2" type="number" class="phone" maxlength="1" min="1" placeholder="0" >
                  <input v-model="phone3" type="number" class="phone" maxlength="1" min="1" placeholder="0" >
                  <input v-model="phone4" type="number" class="phone" maxlength="1" min="1" placeholder="0" >
                  <input v-model="phone5" type="number" class="phone" maxlength="1" min="1" placeholder="0" >
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
      phone1: null,
      phone2: null,
      phone3: null,
      phone4: null,
      phone5: null,
      phone6: null,
    }
  },
}

</script>

<style>

.form-group {
  display: block;
}

.phone {
  width: 40px;
  height: 50px;
  text-align: center;
  margin-right: 20px;
}

/* Chrome, Safari, Edge, Opera */
input.phone::-webkit-outer-spin-button,
input.phone::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input.phone[type=number] {
  -moz-appearance: textfield;
}

</style>