<template>
  <div> 
    <div class="page section-header text-center">
      <div class="page-title">
        <div class="wrapper">
          <h1 class="page-width">Thanh toán đơn hàng</h1>
        </div>
      </div>
    </div> 
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
          <div class="customer-box returning-customer">
            <h3>
              <i class="icon anm anm-user-al"></i> 
                Đăng nhập tài khoản tại đây ? 
                <router-link to="/login" class="text-white text-decoration-underline" data-toggle="collapse">
                  Nhấn vào đây
                </router-link>
            </h3>
            <div id="customer-login" class="collapse customer-content">
              <div class="customer-info">
                <p class="coupon-text">If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                <div class="row">
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <label for="exampleInputEmail1">Email address <span class="required-f">*</span>
                    </label>
                    <input type="email" class="no-margin" id="exampleInputEmail1">
                  </div>
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <label for="exampleInputPassword1">Password <span class="required-f">*</span>
                    </label>
                    <input type="password" id="exampleInputPassword1">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-check width-100 margin-20px-bottom">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value=""> Remember me! </label>
                      <a href="#" class="float-right">Forgot your password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
          <div class="customer-box customer-coupon">
            <h3 class="font-15 xs-font-13">
              <i class="icon anm anm-gift-l"></i> 
              Bạn có mã giảm giá ? 
              <a class="text-white text-decoration-underline show-coupon" @click="showCouponBox = !showCouponBox">
                Ấn vào đây để áp dụng mã giảm giá
              </a>
            </h3> 
            <div id="have-coupon" class="coupon-checkout-content" :class=" { 'collapse': showCouponBox }">
              <div class="discount-coupon">
                <div id="coupon" class="coupon-dec tab-pane active">
                  <p class="margin-10px-bottom">Nhập vào mã giảm giá của bạn.</p>
                  <label class="required get" for="coupon-code">
                    <span class="required-f">*</span> Mã giảm giá </label>
                  <input v-model="code" id="coupon-code" required="" type="text" class="mb-3">
                  <button @click="applyCoupon" class="coupon-btn btn" type="button">Áp dụng</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
      <div class="row billing-fields"> 
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
          <div class="create-ac-content bg-light-gray padding-20px-all">
            <form>
              <fieldset>
                <h2 class="login-title mb-3">Thông tin thanh toán</h2>
                <div class="row">
                  <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                    <label for="input-firstname">Họ <span class="required-f">*</span>
                    </label>
                    <input :value="user.first_name" type="text" id="input-firstname">
                  </div>
                  <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                    <label for="input-lastname">Tên <span class="required-f">*</span>
                    </label>
                    <input :value="user.last_name" id="input-lastname" type="text">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                    <label for="input-email">Email <span class="required-f">*</span>
                    </label>
                    <input :value="user.email" :readonly="user.email.length > 0" id="input-email" type="email">
                  </div>
                  <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                    <label for="input-telephone">Số điện thoại <span class="required-f">*</span>
                    </label>
                    <input :value="user.phone" id="input-telephone" type="tel">
                  </div>
                </div>
              </fieldset>
              <fieldset>  
                <div class="row"> 
                  <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                    <label for="input-country">Tỉnh/Thành phố <span class="required-f">*</span>
                    </label>
                    <select v-model="province">
                      <option value="" selected="true"> --- Chọn tỉnh/thành phố --- </option>
                      <option 
                        v-for="province in provinces"
                        :key="province.id"
                        :value="province.id" 
                      >
                        {{ province.name }}
                      </option>
                    </select>
                  </div>
                  <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                    <label for="input-zone">Quận/Huyện <span class="required-f">*</span></label>
                    <select v-model="district">
                      <option value=""> --- Chọn quận/huyện --- </option> 
                      <option 
                        v-for="district in districts"
                        :key="district.id"
                        :value="district.id"
                        :selected="cart.district_id == district.id"
                      >
                        {{ district.name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                    <label for="input-zone">Phường/Xã <span class="required-f">*</span></label>
                    <select v-model="ward">
                      <option value=""> --- Chọn phường/xã --- </option> 
                      <option 
                        v-for="ward in wards"
                        :key="ward.id"
                        :value="ward.id"
                        :selected="cart.ward_id == ward.id"
                      >
                        {{ ward.name }}
                      </option>
                    </select>
                  </div> 
                </div>
              </fieldset> 
              
              <fieldset>
                <div class="row mt-2">
                  <div class="form-group col-md-12 col-lg-12 col-xl-12">
                    <label for="input-company">Ghi chú cho đơn hàng <span class="required-f">*</span>
                    </label>
                    <textarea v-model="note" class="form-control resize-both" rows="3"></textarea>
                  </div>
                </div>
              </fieldset>
              <div class="d-flex justify-content-end">
                <button type="button" @click="saveData" class="btn">Lưu lại</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="your-order-payment">
            <div class="your-order">
              <h2 class="order-title mb-4">Thông tin đơn hàng</h2>
              <div class="table-responsive-sm order-table">
                <table v-if="cart" class="bg-white table table-bordered table-hover text-center">
                  <thead>
                    <tr>
                      <th class="text-left">Tên sản phẩm</th>
                      <th>Giá</th> 
                      <th>SL</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="item in cart.details" :key="item.id">
                      <td class="text-left">{{ item.name  }}</td>
                      <td>{{  item.price | vietnamdong }}</td>
                      <td>{{  item.quantity }}</td>
                      <td>{{  item.total | vietnamdong }}</td> 
                    </tr> 
                  </tbody>
                  <tfoot class="font-weight-600">
                    <tr>
                      <td colspan="4" class="text-right">Thành tiền </td>
                      <td>{{ cart.sub_total | vietnamdong }}</td>
                    </tr>
                    <tr>
                      <td colspan="4" class="text-right">Phí vận chuyển </td>
                      <td>{{ cart.fee | vietnamdong }}</td>
                    </tr>
                    <tr>
                      <td colspan="4" class="text-right">Giảm giá </td>
                      <td>{{ cart.discount | vietnamdong }}</td>
                    </tr>
                    <tr>
                      <td colspan="4" class="text-right">Tổng thanh toán</td>
                      <td>
                        <b>{{  cart.total | vietnamdong }}</b>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <hr />
            <div class="your-payment">
              <h2 class="payment-title mb-3">Phương thức thanh toán</h2>
              <div class="payment-method">
                <div class="payment-accordion">
                  <div id="accordion" class="payment-section">
                    <l-dropdown-content title="Thanh toán khi nhận hàng">
                      <p class="no-margin font-15">
                        Thực hiện thanh toán trực tiếp sau khi nhận được hàng từ phía bên vận chuyển 
                      </p> 
                    </l-dropdown-content>
                    <l-dropdown-content title="Thanh toán online">
                      <fieldset>
                        <div class="row">
                          <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                            <label for="input-cardname">Tên chủ thẻ<span class="required-f">*</span>
                            </label>
                            <input name="cardname" value="" placeholder="Card Name" id="input-cardname" class="form-control" type="text">
                          </div>
                          <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                            <label for="input-country">Credit Card Type <span class="required-f">*</span>
                            </label>
                            <select name="country_id" class="form-control">
                              <option value=""> --- Please Select --- </option>
                              <option value="1">American Express</option>
                              <option value="2">Visa Card</option>
                              <option value="3">Master Card</option>
                              <option value="4">Discover Card</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                            <label for="input-cardno">Mã số thẻ <span class="required-f">*</span>
                            </label>
                            <input name="cardno" value="" placeholder="Credit Card Number" id="input-cardno" class="form-control" type="text">
                          </div>
                          <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                            <label for="input-cvv">Mã CVV <span class="required-f">*</span>
                            </label>
                            <input name="cvv" value="" placeholder="Card Verification Number" id="input-cvv" class="form-control" type="text">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                            <label>Ngày hết hạn <span class="required-f">*</span>
                            </label>
                            <input type="date" name="exdate" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                            <img class="padding-25px-top xs-padding-5px-top" src="assets/images/payment-img.jpg" alt="card" title="card" />
                          </div>
                        </div>
                      </fieldset>
                    </l-dropdown-content> 
                    <div class="form-group d-flex checkout-btn">
                      <input v-model="payment_type" class="form-control" checked type="radio" value="1" id="thanhtoan1" />
                      <label for="thanhtoan1">Thanh toán khi nhận hàng</label>
                    </div>
                    <div class="form-group d-flex checkout-btn">
                      <input v-model="payment_type" class="form-control" type="radio" value="2" id="thanhtoan2" />
                      <label for="thanhtoan2">Thanh toán online</label>
                    </div>
                  </div>
                </div>
                <div class="order-button-payment">
                  <button @click="checkout" class="btn" value="Place order">Thanh toán</button>
                </div>
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
  name: 'CheckoutView',
  data() {
    return {
      showCouponBox: true,
      province: null,
      district: null,
      ward: null, 
      code: null,
      payment_type: 1,
      note: ''
    }
  },
  beforeMount() { 
    this.$store.dispatch('cart/getCarts')
      .then(response => {
        const { province_id, district_id, ward_id, coupon } = response; 
        this.province = province_id;
        this.district = district_id;
        this.ward = ward_id;
        this.code = coupon?.code;
      })
    this.$store.dispatch('address/provinces');
  },
  computed: {
    cart() {
      return this.$store.state.cart.carts; 
    },
    provinces() {
      return this.$store.state.address.provinces;
    },
    districts() {
      return this.$store.state.address.districts;
    },
    wards() {
      return this.$store.state.address.wards;
    },
    user() {
      return this.$store.state.auth.user;
    },
    fee() {
      return this.$store.getters['address/fee'] || 0;
    }
  },
  watch: {
    province: {
      handler: function(value) {
        this.$store.commit('address/SET_PROVINCE', value)
        this.$store.commit('address/SET_DISTRICTS', [])
        this.$store.commit('address/SET_WARDS', [])
        this.$store.dispatch('address/districts');
      }
    },
    district: {
      handler: function(value) {
        this.$store.commit('address/SET_DISTRICT', value)
        this.$store.dispatch('address/wards');
      }
    },
    ward: {
      handler: function(value) { 
        this.$store.commit('address/SET_WARD', value) 
      }
    }
  },
  methods: {
    saveData() {
      this.$store.dispatch('address/updateShipAddress')
      this.$store.dispatch('address/getFee')
        .then(() => {
          this.$store.dispatch('cart/getCarts');
        })
    },
    checkout() {
      this.$store.dispatch('cart/checkout', {
        payment_type: this.payment_type,
        note: this.note
      }).then(() => {
        this.$notify({
            group: 'alert',
            title: 'Thành công',
            text: "Thành công",
            type: 'error'
          })
      })
    },
    applyCoupon() { 
      this.$store.dispatch('cart/applyCoupon', this.code)
        .then(response => {
          console.log(response)
          this.$notify({
              group: 'alert',
              title: 'Thất bại',
              text: 'Chúc mừng bạn đã thêm mã thành công',
              type: 'success'
            })
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

<style>

.order-button-payment button {
  padding: 10px !important;
  font-size: 0.9rem !important;
}

.show-coupon {
  cursor: pointer;
}

.checkout-btn {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 5px 0;
  font-size: 1rem;
  margin-bottom: 0;
}

.checkout-btn input {
  width: 20px;
}

.checkout-btn label {
  align-self: center;
  margin-bottom: 0;
  cursor: pointer;
}

</style>