<template>
  <div>
    <h3>Order</h3>
    <hr />
    <div>
      <table>
        <thead class="cart__row cart__header">
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
            class="cart__row border-bottom py-2"
            v-for="order in orders"
            :key="order.id"
          >
            <td class=""> 
              {{ order.id }}
            </td>
            <td class=""> 
              {{  order.created_at }}
            </td>
            <td class="text-right"> 
              {{ order.details.length }}
            </td>
            <td class="text-right"> 
              {{ order.total | vietnamdong }}
            </td>
            <td style="width: 100px">
              <button class="">Mua lại</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>

export default {
  name: 'OrderComponent',
  data() {
    return {
      orders: []
    };
  },
  mounted() {
    this.getOrder();
  },
  methods: {
    getOrder() { 
      this.$store.dispatch('order/getOrder')
        .then(orders => {
          this.orders = orders;
        })
    }
  },
  computed: {
    
  }
}

</script>