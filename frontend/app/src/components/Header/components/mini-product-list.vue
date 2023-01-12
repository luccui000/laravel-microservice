<template>
  <li class="item">
    <a class="product-image" href="#">
      <img src="/assets/images/product-images/cape-dress-1.jpg" alt="3/4 Sleeve Kimono Dress" title="" />
    </a>
    <div class="product-details">
      <a href="#" class="remove">
        <i class="anm anm-times-l" aria-hidden="true"></i>
      </a>
      <a href="#" class="edit-i remove">
        <i class="anm anm-edit" aria-hidden="true"></i>
      </a>
      <a class="pName" href="cart.html">Sleeve Kimono Dress</a>
      <div class="variant-cart">Black / XL</div>
      <div class="wrapQtyBtn">
        <div class="qtyField">
          <span class="label">Qty:</span>
          <a class="qtyBtn minus" href="javascript:void(0);">
            <i class="fa anm anm-minus-r" aria-hidden="true"></i>
          </a>
          <input type="text" value="1" class="product-form__input qty">
          <a class="qtyBtn plus" href="javascript:void(0);">
            <i class="fa anm anm-plus-r" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="priceRow">
        <div class="product-price">
          <span class="money">$59.00</span>
        </div>
      </div>
    </div>
  </li>
</template>

<script>

export default {
  props: ['product']
}

</script>