<template>
  <div class="modal fade" :class="{ 'show' : isShow}" v-if="product">
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
                      <img class="blur-up ls-is-cached lazyloaded" data-src="assets/images/product-detail-page/camelia-reversible-big1.jpg" src="assets/images/product-detail-page/camelia-reversible-big1.jpg" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="product-single__meta">
                    <h2 class="product-single__title">{{ product.name }}</h2>
                    <div class="prInfoRow">
                      <div class="product-stock">
                        <span class="instock ">In Stock</span>
                        <span class="outstock hide">Unavailable</span>
                      </div>
                      <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span>
                      </div>
                    </div>
                    <p class="product-single__price product-single__price-product-template">
                      <span class="visually-hidden">Regular price</span>
                      <s id="ComparePrice-product-template">
                        <span class="money">$600.00</span>
                      </s>
                      <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                        <span id="ProductPrice-product-template">
                          <span class="money">$500.00</span>
                        </span>
                      </span>
                    </p>
                    <div class="product-single__description rte"> Belle Multipurpose Bootstrap 4 Html Template that will give you and your customers a smooth shopping experience which can be used for various kinds of stores such as fashion,... </div>
                    <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                      <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                        <div class="product-form__item">
                          <label class="header">Color: <span class="slVariant">Red</span>
                          </label>
                          <div data-value="Red" class="swatch-element color red available">
                            <input class="swatchInput" id="swatch-0-red" type="radio" name="option-0" value="Red">
                            <label class="swatchLbl color medium rectangle" for="swatch-0-red" style="background-image:url(assets/images/product-detail-page/variant1-1.jpg);" title="Red"></label>
                          </div>
                          <div data-value="Blue" class="swatch-element color blue available">
                            <input class="swatchInput" id="swatch-0-blue" type="radio" name="option-0" value="Blue">
                            <label class="swatchLbl color medium rectangle" for="swatch-0-blue" style="background-image:url(assets/images/product-detail-page/variant1-2.jpg);" title="Blue"></label>
                          </div>
                          <div data-value="Green" class="swatch-element color green available">
                            <input class="swatchInput" id="swatch-0-green" type="radio" name="option-0" value="Green">
                            <label class="swatchLbl color medium rectangle" for="swatch-0-green" style="background-image:url(assets/images/product-detail-page/variant1-3.jpg);" title="Green"></label>
                          </div>
                          <div data-value="Gray" class="swatch-element color gray available">
                            <input class="swatchInput" id="swatch-0-gray" type="radio" name="option-0" value="Gray">
                            <label class="swatchLbl color medium rectangle" for="swatch-0-gray" style="background-image:url(assets/images/product-detail-page/variant1-4.jpg);" title="Gray"></label>
                          </div>
                        </div>
                      </div>
                      <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                        <div class="product-form__item">
                          <label class="header">Size: <span class="slVariant">XS</span>
                          </label>
                          <div data-value="XS" class="swatch-element xs available">
                            <input class="swatchInput" id="swatch-1-xs" type="radio" name="option-1" value="XS">
                            <label class="swatchLbl medium rectangle" for="swatch-1-xs" title="XS">XS</label>
                          </div>
                          <div data-value="S" class="swatch-element s available">
                            <input class="swatchInput" id="swatch-1-s" type="radio" name="option-1" value="S">
                            <label class="swatchLbl medium rectangle" for="swatch-1-s" title="S">S</label>
                          </div>
                          <div data-value="M" class="swatch-element m available">
                            <input class="swatchInput" id="swatch-1-m" type="radio" name="option-1" value="M">
                            <label class="swatchLbl medium rectangle" for="swatch-1-m" title="M">M</label>
                          </div>
                          <div data-value="L" class="swatch-element l available">
                            <input class="swatchInput" id="swatch-1-l" type="radio" name="option-1" value="L">
                            <label class="swatchLbl medium rectangle" for="swatch-1-l" title="L">L</label>
                          </div>
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
                          <button type="button" name="add" class="btn product-form__cart-submit">
                            <span>Thêm vào giỏ hàng</span>
                          </button>
                        </div>
                      </div> 
                    </form>
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

export default {
  name: 'QuickView',
  props: ['product', 'isShow'], 
  data() {
    return { 
      quantity: 1,
    }
  }, 
  methods: {
    closeQuickView() {
      this.$emit('close', !this.isShow);
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