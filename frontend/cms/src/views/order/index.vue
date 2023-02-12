<template>
  <div>
    <h3>Chi tiết đơn hàng</h3>
    <el-tabs v-model="activeName" @tab-click="handleClick">
      <el-tab-pane label="Tất cả đơn hàng" name="all">
        <all-order-component :orders="orders" />
      </el-tab-pane>
      <el-tab-pane label="Đã hoàn thành" name="success">
        <success-order-component :orders="orders" />
      </el-tab-pane>
      <el-tab-pane label="Đang chờ xác nhận" name="pending">
        <pending-order-component :orders="orders" />
      </el-tab-pane>
      <el-tab-pane label="Bị huỷ" name="canceled">
        <failed-order-component :orders="orders" />
      </el-tab-pane>
    </el-tabs>
  </div>
</template>

<script>
import AllOrderComponent from './components/all.vue'
import SuccessOrderComponent from './components/success.vue'
import FailedOrderComponent from './components/failed.vue'
import PendingOrderComponent from './components/pending.vue'

export default {
  name: 'OrderView',
  components: {
    AllOrderComponent,
    SuccessOrderComponent,
    FailedOrderComponent,
    PendingOrderComponent,
  },
  data() {
    return {
      activeName: 'all'
    }
  },
  mounted() {
    this.$store.dispatch('order/getOrders', this.activeName)
  },
  methods: {
    handleClick(tab) {
      this.$store.dispatch('order/getOrders', tab.name)
    }
  },
  computed: {
    orders() {
      return this.$store.state.order.orders;
    }
  }
}

</script>