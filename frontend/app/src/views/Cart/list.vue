<template>
  <div class="cart style2">
    <table>
      <thead class="cart__row cart__header">
        <tr>
          <th colspan="2" class="text-center">Tên sản phẩm</th>
          <th class="text-center">Giá</th>
          <th class="text-center">Số lượng</th>
          <th class="text-right">Thành tiền</th>
          <th class="action">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <slot></slot>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3" class="text-left">
            <a href="#" class="btn btn-secondary btn--small cart-continue">Continue shopping</a>
          </td>
          <td colspan="3" class="text-right">
            <button type="submit" name="clear" class="btn btn-secondary btn--small  small--hide">Clear Cart</button>
            <button type="submit" name="update" class="btn btn-secondary btn--small cart-continue ml-2">Update Cart</button>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</template>

<script>

export default {
  name: 'CartList',
  components: {
  },
}
</script>

<style scoped>

</style>