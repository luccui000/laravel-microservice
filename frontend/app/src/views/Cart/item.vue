<template>
  <tr class="cart__row border-bottom line1 cart-flex border-top">
    <td class="cart__image-wrapper cart-flex-item">
      <a href="#">
        <img class="cart__image" src="/assets/images/product-images/home7-product4.jpg" alt="Minerva Dress black">
      </a>
    </td>
    <td class="cart__meta small--text-left cart-flex-item">
      <div class="list-view-item__title">
        <a href="#">Minerva Dress black</a>
      </div>
    </td>
    <td class="cart__price-wrapper cart-flex-item">
      <span class="money">$526.00</span>
    </td>
    <td class="cart__update-wrapper cart-flex-item text-right">
      <div class="cart__qty text-center">
        <div class="qtyField">
          <a class="qtyBtn minus" href="javascript:void(0);">
            <i class="icon icon-minus"></i>
          </a>
          <input class="cart__qty-input qty" type="text" name="updates[]" id="qty" value="1" pattern="[0-9]*">
          <a class="qtyBtn plus" href="javascript:void(0);">
            <i class="icon icon-plus"></i>
          </a>
        </div>
      </div>
    </td>
    <td class="text-right small--hide cart-price">
      <div>
        <span class="money">$735.00</span>
      </div>
    </td>
    <td class="text-center small--hide">
      <a href="#" class="btn btn--secondary cart__remove" title="Remove tem">
        <i class="icon icon anm anm-times-l"></i>
      </a>
    </td>
  </tr>
</template>

<script>
export default {
  name: 'CartItem'
}
</script>

<style scoped>

</style>