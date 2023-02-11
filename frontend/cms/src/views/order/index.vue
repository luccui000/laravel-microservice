<template>
  <div>
    <h3>Chi tiết đơn hàng</h3>
    <el-tabs v-model="activeName" @tab-click="handleClick">
      <el-tab-pane label="Tất cả đơn hàng" name="first">
        <all-order-component />
      </el-tab-pane>
      <el-tab-pane label="Đã hoàn thành" name="second">
        <success-order-component />
      </el-tab-pane>
      <el-tab-pane label="Đang chờ xác nhận" name="third">
        <pending-order-component />
      </el-tab-pane>
      <el-tab-pane label="Bị huỷ" name="fourth">
        <failed-order-component />
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
      activeName: 'first'
    }
  },
  methods: {
    handleClick(tab, event) {
      console.log(tab, event);

    }
  }
}

</script>