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
        <tr>
          <td colspan="5">
            <p class="text-center">Chưa có sản phẩm nào trong giỏ hàng</p>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3" class="text-left">
            <router-link class="btn btn-secondary btn--small cart-continue" to="/products">
              Tiếp tục mua sắm
            </router-link> 
          </td>
          <td colspan="3" class="text-right"> 
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</template>

<script>

export default {
  name: 'EmptyList',
  components: {
  },
}
</script>

<style scoped>

</style>