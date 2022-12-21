<template>
  <div>
    <div class="page section-header text-center">
      <div class="page-title">
        <div class="wrapper"><h1 class="page-width">Giỏ hàng của bạn</h1></div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
          <l-alert type="success" v-show="isSuccess">
            <i class="icon anm anm-truck-l icon-large"></i> &nbsp;<strong>Congratulations!</strong> You've got free shipping!
          </l-alert> 
          <cart-list>
            <cart-item></cart-item>
            <cart-item></cart-item>
            <cart-item></cart-item>
          </cart-list>
        </div>
        <div class="container mt-4">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
              <h5>Discount Codes</h5>
              <form action="#" method="post">
                <div class="form-group">
                  <label for="address_zip">Enter your coupon code if you have one.</label>
                  <input type="text" name="coupon">
                </div>
                <div class="actionRow">
                  <div><input type="button" class="btn btn-secondary btn--small" value="Apply Coupon"></div>
                </div>
              </form>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
              <h5>Estimate Shipping and Tax</h5>
              <div class="form-group">
                <label for="address_country">Country</label>
                <select id="address_country" name="address[country]" data-default="United States">
                  <option value="Belgium" data-provinces="[]">Belgium</option>
                </select>
              </div>
              <div class="form-group">
                <label for="address_country">City</label>
                <select id="address_country" name="address[country]" data-default="United States">
                  <option value="Belgium" data-provinces="[]">Belgium</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
              <div class="solid-border">
                <div class="row border-bottom pb-2">
                  <span class="col-12 col-sm-6 cart__subtotal-title">Tạm tính</span>
                  <span class="col-12 col-sm-6 text-right">
                    <span class="money">$735.00</span>
                  </span>
                </div> 
                <div class="row border-bottom pb-2 pt-2">
                  <span class="col-12 col-sm-6 cart__subtotal-title">Phí vận chuyển</span>
                  <span class="col-12 col-sm-6 text-right">Free shipping</span>
                </div>
                <div class="row border-bottom pb-2 pt-2">
                  <span class="col-12 col-sm-6 cart__subtotal-title">
                    <strong>Tổng tiền</strong>
                  </span>
                  <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right">
                    <span class="money">$1001.00</span>
                  </span>
                </div>
                <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                <p class="cart_tearm">
                  <label>
                    <input type="checkbox" name="tearm" class="checkbox" value="tearm" required=""> Tôi đồng ý với các điều khoản </label>
                </p>
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
import CartList from '@/views/Cart/list';
import CartItem from '@/views/Cart/item';

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
      isSuccess: false
    }
  }
}
</script>

<style scoped>
.btn--small-wide {
  width: 100%;
  padding: 10px 5px;
}
</style>