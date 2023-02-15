<template>
  <div>
    <div class="page section-header text-center">
			<div class="page-title">
        <div class="wrapper">
          <h1 class="page-width">Danh sách đơn hàng của bạn</h1>
        </div>
      </div> 
		</div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
          <table>
            <thead class="cart__header">
              <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th class="text-right">Số lượng sản phẩm</th> 
                <th class="text-right">Tổng tiền</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="cart__row border-bottom row-data"
                v-for="order in orders"
                :key="order.id"
              >
                <td class="my-4"> 
                  {{ order.order_number }}
                </td>
                <td class="my-4"> 
                  {{  order.created_at | diffForHuman }}
                </td>
                <td class="text-right"> 
                  {{ order.details.length }}
                </td>
                <td class="text-right"> 
                  {{ order.total | vietnamdong }}
                </td> 
                <td class="text-right"> 
                  <a :href="`#${order.id}`">Chi tiết</a>
                </td> 
              </tr>
            </tbody>
          </table> 
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

export default {
  name: 'TrackingOrderView',
  data() {
    return {
      phone: ''
    }
  },
  mounted() { 
    
  },
  computed: {
    orders() {
      return this.$store.state.order.orders;
    }
  }
}

</script>


<style>

.row-data {
  height: 50px;
}
</style>