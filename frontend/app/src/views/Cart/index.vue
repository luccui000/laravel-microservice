<template>
  <div>
    <div class="page section-header text-center">
      <div class="page-title">
        <div class="wrapper"><h1 class="page-width">Giỏ hàng của bạn</h1></div>
      </div>
    </div> 
    <div class="container" v-if="cart">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
          <l-alert type="success" v-show="isSuccess">
            <i class="icon anm anm-truck-l icon-large"></i> &nbsp;<strong>Chúc mừng!</strong> You've got free shipping!
          </l-alert> 
          <cart-list>
            <cart-item 
              v-for="cart in cart.details" 
              :key="cart.id"
              :cart="cart"
            ></cart-item> 
          </cart-list>
        </div>
        <div class="container mt-4">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
              <h5>Nhập mã giảm giá</h5>
              <div >
                <div class="form-group"> 
                  <label for="address_zip">Nhập vào mã giảm giá để áp dụng.</label>
                  <input type="text" class="coupon-input" v-model="coupon">
                </div>
                <div class="actionRow">
                  <div>
                    <input type="button" @click="applyCoupon" class="btn btn-secondary btn--small" value="Áp dụng"></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
              
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
              <div class="solid-border">
                <div class="row border-bottom pb-2">
                  <span class="col-12 col-sm-6 cart__subtotal-title">Tạm tính</span>
                  <span class="col-12 col-sm-6 text-right">
                    <span class="money">{{  cart.sub_total | vietnamdong }}</span>
                  </span>
                </div> 
                <div class="row border-bottom pb-2 pt-2">
                  <span class="col-12 col-sm-6 cart__subtotal-title">Phí vận chuyển</span>
                  <span class="col-12 col-sm-6 text-right">Miễn phí</span>
                </div>
                <div class="row border-bottom pb-2 pt-2">
                  <span class="col-12 col-sm-6 cart__subtotal-title">Giảm giá</span>
                  <span class="col-12 col-sm-6 text-right">{{ cart.discount | vietnamdong  }}</span>
                </div>
                <div class="row border-bottom pb-2 pt-2">
                  <span class="col-12 col-sm-6 cart__subtotal-title">
                    <strong>Tổng tiền</strong>
                  </span>
                  <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right">
                    <span class="money">{{  cart.total | vietnamdong }}</span>
                  </span>
                </div>
                <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div> 
                <router-link to="/checkout" class="btn btn--small-wide">
                  Tiến hành thanh toán
                </router-link>
                <div class="paymnet-img">
                  <img src="assets/images/payment-img.jpg" alt="Payment">
                </div>
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
import NewLetter from '@/components/NewLetter';
import PageFooter from '@/components/Footer';
import CartList from '@/views/Cart/components/list';
import CartItem from '@/views/Cart/components/item';

export default {
  name: 'CartIndex',
  components: {
    CartList,
    NewLetter,
    PageFooter,
    CartItem
  },
  data() {
    return {
      isSuccess: false,
      coupon: null,
      isDisable: false
    }
  },
  mounted() {
    this.$store.dispatch('cart/getCarts')
      .then(() => {
        let couponData = this.$store.getters['cart/getCoupon'];
        if(couponData) {
          this.coupon = couponData.code; 
          this.isDisable = true;
        }
      })
  },
  computed: {
    cart() {
      return this.$store.state.cart.carts;
    }
  },
  methods: {
    alertMessage() {
      this.$modal.alert('Thêm vào giỏ hàng thành công')
    },
    applyCoupon() { 
      this.$store.dispatch('cart/applyCoupon', this.coupon)
    }
  }
}
</script>

<style scoped>
.btn--small-wide {
  width: 100%;
  padding: 10px 5px;
}
.btn-secondary {
  color: #000;
}

.btn-secondary:hover {
  color: #fff;
}

.coupon-input {
  width: 200px;
}

</style>