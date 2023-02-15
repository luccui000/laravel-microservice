<template>
  <div class="modal fade" :class="{ 'show' : isShow }" v-if="product">
    <div class="modal-dialog">
      <div class="modal-content" id="quick-view-content">
        <div class="modal-body">
          <div id="ProductSection-product-template" class="product-template__container prstyle1">
            <div class="product-single"> 
              <div @click="closeQuickView" class="model-close-btn pull-right" title="close">
                <span class="icon icon anm anm-times-l"></span>
              </div> 
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="product-details-img">
                    <div class="pl-20">
                      <img class="blur-up ls-is-cached lazyloaded" 
                        :data-src="product.image_origin" 
                        :src="product.image_origin"  alt="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="product-single__meta">
                    <h2 class="product-single__title">{{ product.name }}</h2>
                    <div class="prInfoRow">
                      <div class="product-stock">
                        <span class="instock ">Còn hàng</span>
                        <span class="outstock hide">Unavailable</span>
                      </div>
                      <div class="product-sku">SKU: <span class="variant-sku">{{ item.sku}}</span>
                      </div>
                    </div>
                    <p v-if="product.has_variant" class="product-single__price product-single__price-product-template">
                      <span class="visually-hidden"></span>
                      <s id="ComparePrice-product-template">
                        <span class="money">{{ product.min_price | vietnamdong }}</span>
                      </s>
                      <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                        <span id="ProductPrice-product-template">
                          <span class="money">{{ item.price | vietnamdong }}</span>
                        </span>
                      </span>
                    </p>
                    <p v-else class="product-single__price product-single__price-product-template">
                      <span class="visually-hidden"></span>
                      <s id="ComparePrice-product-template">
                        <span class="money">{{ product.price | vietnamdong }}</span>
                      </s>
                      <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                        <span id="ProductPrice-product-template">
                          <span class="money">{{ product.sell_price | vietnamdong }}</span>
                        </span>
                      </span>
                    </p>
                    <div class="product-single__description rte"> Belle Multipurpose Bootstrap 4 Html Template that will give you and your customers a smooth shopping experience which can be used for various kinds of stores such as fashion,... </div>
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
                      <!-- Product Action -->
                      <div class="product-action clearfix">
                        <div class="product-form__item--quantity">
                          <div class="wrapQtyBtn">
                            <div class="qtyField">
                              <div class="qtyBtn minus" @click="decrement" >
                                <i class="fa anm anm-minus-r" aria-hidden="true"></i>
                              </div>
                              <input type="text" v-model="quantity" value="1" class="product-form__input qty">
                              <div class="qtyBtn plus" @click="increment" >
                                <i class="fa anm anm-plus-r" aria-hidden="true"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-form__item--submit">
                          <button @click="addToCart" type="button" name="add" class="btn product-form__cart-submit">
                            <span>Thêm vào giỏ hàng</span>
                          </button>
                        </div>
                      </div> 
                    </div>
                    <div class="display-table shareRow">
                      <div class="display-table-cell">
                        <div class="wishlist-btn">
                          <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
                            <i class="icon anm anm-heart-l" aria-hidden="true"></i>
                            <span>Thêm vào danh sách yêu thích</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
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
import ProductVariantColor from '@/views/ProductDetail/components/color.vue';
import ProductVariantSize from '@/views/ProductDetail/components/size.vue';

export default {
  name: 'QuickViewComponent',
  components: {
    ProductVariantColor,
    ProductVariantSize
  },
  props: ['product', 'isShow'], 
  data() {
    return { 
      quantity: 1,
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
  mounted() {
    let details = this.$store.getters['cart/detailCart'];
    if(details && details.length) {
      let product = details.filter(el => el.product_id == this.product.id);
      if(product.length) { 
        this.quantity = product[0].quantity; 
        this.calcSku(); 
      }
    } 
    if(this.product) {
      this.color = this.product.colors[0]?.name;
      this.item.color = this.product.colors[0]?.id;
      this.size = this.product.sizes[0]?.name;
      this.item.size = this.product.sizes[0]?.id;
      this.calcSku();
    }
  },
  methods: {
    closeQuickView() {
      this.$emit('close', !this.isShow);
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
    increment() {
      if(this.quantity < this.product.stock) {
        this.quantity++;
      } else {
        alert(`Mặt hàng hiện tại chỉ còn lại: ${this.product.stock}`); 
      }
    },
    decrement() {
      if(this.quantity > 1)  {
        this.quantity--; 
      }
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
  }
}

</script>

<style scoped> 
.modal {
  position: fixed;
  top: 0; 
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.2);
  transition: .3s linear;
}

#quick-view-content {
  min-width: 1000px;
  position: absolute;
  left: 50%; 
  top: 50px;
  transform: translateX(-50%); 
}
.show {
  display: block;
  transition: .3s linear;
}

.model-close-btn {
  cursor: pointer;
}
.qtyBtn {
  background-color: #eee;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}
.qty {
  width: 30px;
}
</style>