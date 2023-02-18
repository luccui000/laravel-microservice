<template>
  <div class="product-single" v-if="product">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="product-details-img"> 
          <div class="zoompro-wrap product-zoom-right pl-20">
            <div class="zoompro-span">
              <img class="lazyload zoompro" 
                data-zoom-image="/assets/images/product-detail-page/camelia-reversible-big1.jpg" 
                alt="" 
                :src="product.image_origin" 
              />
            </div> 
            <div class="product-buttons">
              <a href="#" class="btn popup-video" title="Xem video">
                <i class="icon anm anm-play-r" aria-hidden="true"></i>
              </a>
              <a href="#" class="btn prlightbox" title="Zoom">
                <i class="icon anm anm-expand-l-arrows" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="product-single__meta">
          <h1 class="product-single__title">{{ product.name }}</h1>
          <div class="product-nav clearfix">
            <a href="#" class="next" title="Next">
              <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
          </div>
          <div class="prInfoRow">
            <div class="product-stock">
              <span class="instock ">Còn hàng</span>
              <span class="outstock hide">Hết hàng</span>
            </div>
            <div class="product-sku">SKU: <span class="variant-sku">{{ item.sku }}</span>
            </div>
            <div class="product-review">
              <a class="reviewLink" href="#tab2">
                <i class="font-13 fa fa-star"></i>
                <i class="font-13 fa fa-star"></i>
                <i class="font-13 fa fa-star"></i>
                <i class="font-13 fa fa-star-o"></i>
                <i class="font-13 fa fa-star-o"></i>
                <span class="spr-badge-caption">6 bình luận</span>
              </a>
            </div>
          </div>
          <p class="product-single__price product-single__price-product-template">
            <span class="visually-hidden">Regular price</span>
            <s id="ComparePrice-product-template">
              <span class="money">$600.00</span>
            </s>
            <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
              <span id="ProductPrice-product-template">
                <span class="money">{{ item.price | vietnamdong  }}</span>
              </span>
            </span> 
          </p>
          <div class="orderMsg" data-user="23" data-time="24">
            <img src="/assets/images/order-icon.jpg" alt="" />
            <span v-html="soldFire"></span> 
          </div>
        </div>
        <div class="product-single__description rte">
          {{ product.description }}
        </div>
        <div id="quantity_message" v-html="inStock"></div>
        <div class="product-form product-form-product-template hidedropdown" >
          <div class="swatch clearfix swatch-0 option1">
            <div class="product-form__item">
              <label class="header">Màu sắc: <span class="slVariant">{{ color }}</span>
              </label>
              <product-variant-color
                v-for="item in product.colors"
                :key="item.id"
                :color="item" 
                @set-color="setColor"
                :isSelect="color === item.name"
              >
              </product-variant-color> 
            </div>
          </div>
          <div class="swatch clearfix swatch-1 option2" >
            <div class="product-form__item">
              <label class="header">Kích cỡ: <span class="slVariant">{{ size }}</span>
              </label>
              <product-variant-size
                v-for="size in product.sizes"
                :key="size.id"
                :size="size"
                @set-size="setSize"
              ></product-variant-size>
            </div>
          </div>
          <div class="infolinks">
            <div @click="showSizeGuide = true" class="sizelink btn">Tham khảo kích cỡ</div>
            <div @click="showContact = true" class="emaillink btn"> Liên hệ</div>
          </div>
          <!-- Product Action -->
          <div class="product-action clearfix">
            <div class="product-form__item--quantity">
              <div class="wrapQtyBtn">
                <div class="qtyField">
                  <div class="qtyBtn minus" @click="decrement" >
                    <i class="fa anm anm-minus-r" aria-hidden="true"></i>
                  </div>
                  <input v-model="quantity" type="text" class="product-form__input qty">
                  <div class="qtyBtn plus" @click="increment">
                    <i class="fa anm anm-plus-r" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-form__item--submit">
              <button @click="addToCart" type="button" class="btn product-form__cart-submit">
                <span>Thêm vào giỏ hàng</span>
              </button>
            </div>
            <div class="shopify-payment-button" data-shopify="payment-button">
              <router-link to="/cart" class="shopify-payment-button__button shopify-payment-button__button--unbranded">
                Mua ngay
              </router-link> 
            </div>
          </div>
          <!-- End Product Action -->
        </div>
        <div class="display-table shareRow">
          <div class="display-table-cell medium-up--one-third">
            <div class="wishlist-btn">
              <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
                <i class="icon anm anm-heart-l" aria-hidden="true"></i>
                <span>Thêm vào yêu thích</span>
              </a>
            </div>
          </div>
          <div class="display-table-cell text-right">
            <div class="social-sharing">
              <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                <i class="fa fa-facebook-square" aria-hidden="true"></i>
                <span class="share-title" aria-hidden="true">Chia sẻ</span>
              </a>
              <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <span class="share-title" aria-hidden="true">Tweet</span>
              </a>
              <a href="#" title="Share on google+" class="btn btn--small btn--secondary btn--share">
                <i class="fa fa-google-plus" aria-hidden="true"></i>
                <span class="share-title" aria-hidden="true">Google+</span>
              </a> 
              <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share by Email" target="_blank">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span class="share-title" aria-hidden="true">Email</span>
              </a>
            </div>
          </div>
        </div>
        <p id="freeShipMsg" class="freeShipMsg" data-price="199">
          <i class="fa fa-truck" aria-hidden="true"></i> Miễn phí vận chuyển cho đơn hàng từ <b>500K</b>
        </p>
        <p class="shippingMsg">
          <i class="fa fa-clock-o" aria-hidden="true"></i> Giao hàng dự kiến trong vòng <b id="fromDate">2</b> đến <b id="toDate">5</b> ngày.
        </p>
        <div class="userViewMsg">
          <i class="fa fa-users" aria-hidden="true"></i>
          <strong class="uersView">14</strong> người đang tìm kiếm sản phẩm này
        </div>
      </div>
    </div>
    <size-guide 
      v-if="showSizeGuide"
      @close="closeSizeGuide"
    />
    <ask-product 
      :product="product"
      v-if="showContact"
      @close="closeContact"
    />
  </div>
</template>

<script>
import ProductVariantColor from './color.vue';
import ProductVariantSize from './size.vue';
import SizeGuide from './size-guide.vue';
import AskProduct from './ask.vue'
import moment from 'moment';

export default {
  name: 'ProductDetail',
  components: {
    ProductVariantColor,
    ProductVariantSize,
    SizeGuide,
    AskProduct,
  },
  beforeMount(){
    const { id: productId } = this.$route.params;
    this.$store.dispatch('cart/getCarts');
    
    if(productId) {
      this.getProduct(productId)
    }
  },
  mounted() {
    let details = this.$store.getters['cart/detailCart'];
    if(details && details.length) {
      let product = details.filter(el => el.product_id == this.product.id);
      if(product.length) { 
        this.quantity = product[0].quantity; 
        this.calcSku();
      }
    }
  },
  data() {
    return {
      id: null, 
      quantity: 1,
      selectedColor: null,
      color: null,
      size: null,
      showSizeGuide: false,
      showContact: false,
      price: 0,
      item: {
       color: null,
       size: null,
       sku: null,
       price: null,
       sku_id: null
      }
    }
  },
  computed: {
    soldFire() {
      const hours = moment(new Date()).diff(this.product.created_at, 'hours');
      return `Đã bán được <strong class="items"> ${this.product.sold_count}</strong> sản phẩm sau <strong class="time">${hours}</strong> giờ`;
    },
    inStock() {
      return `Nhanh tay lên, chỉ còn lại <strong class="items">${this.product.stock}</strong> sản phẩm thôi`;
    },
    product() {
      return this.$store.getters['product/getProduct'];
    }
  },
  methods: {
    async getProduct(productId) {
      await this.$store.dispatch('product/getProductById', productId); 
      if(this.product) {
        this.color = this.product.colors[0]?.name;
        this.item.color = this.product.colors[0]?.id;
        this.size = this.product.sizes[0]?.name;
        this.item.size = this.product.sizes[0]?.id;
        this.calcSku();
      }
    },
    increment() {
      if(this.quantity > this.product.stock) {
        alert(`Mặt hàng này hiện tại chỉ còn lại: ${this.product.stock}`);
        this.quantity--;
        return;
      }
      this.quantity++;
    },
    decrement() {
      if(this.quantity < 1) 
        return;
      this.quantity--;
    },
    setColor(color) {  
      this.color = color.name;
      this.item.color = color.id;
      this.calcSku();
    },
    setSize(size) {   
      this.size = size.name;
      this.item.size = size.id;
      this.calcSku();
    },
    calcSku() {
      if(this.product.has_variant) { 
        const skus = this.product.skus;  
        const founded = skus.filter(el => el.color_id == this.item.color && el.size_id == this.item.size);
        if(founded.length) {
          this.item.sku = founded[0].sku;
          this.item.price = founded[0].price;
          this.item.sku_id = founded[0].id;
        }
      }
    },
    closeSizeGuide() {
      this.showSizeGuide = false;
    },
    closeContact() {
      this.showContact = false;
    },
    addToCart() { 
      let has_variant = this.product.has_variant;

      this.$store.dispatch('order/addToCart', {
        product_id: this.product.id,
        sku_id: has_variant ? this.item.sku_id : null,
        qty: this.quantity
      }).then(() => { 
        this.$notify({
          group: 'alert',
          title: 'Thành công',
          text: 'Thêm vào giỏ hàng thành công',
          type: 'success'
        })
      })
    }
  },
  watch: {
    quantity: {
      handler(newVal) {
        if(newVal > this.product.stock) {
          alert(`Mặt hàng hiện tại chỉ còn lại: ${this.product.stock}`);
          this.quantity = this.product.stock;
        } else if (newVal < 1) {
          this.quantity = 1;
        }
      }
    },
  }
}
</script>

<style scoped>
.qtyBtn {
  background-color: #eee;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}
.qty {
  width: 40px;
}

.social-sharing a i {
  margin-right: 10px;
}
</style>