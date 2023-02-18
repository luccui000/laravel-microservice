<template>
  <div>
    <div class="row">
      <div class="col-3">
        <el-card shadow="none">
          <div class="cart-wrapper">
            <span class="cart-title">
              <i class="fa fa-user user-icon"></i>
            </span>
            <div class="cart-content">
              <span>Người dùng</span>
              <span class="cart-counter">20</span>
            </div>
          </div>
        </el-card>
      </div>
      <div class="col-3">
        <el-card shadow="none">
          <div class="cart-wrapper">
            <span class="cart-title">
              <i class="fa text-primary fa-cart-plus"></i>
            </span>
            <div class="cart-content">
              <span>Tổng đơn hàng</span>
              <span class="cart-counter">114</span>
            </div>
          </div>
        </el-card>
      </div>
      <div class="col-3">
        <el-card shadow="none">
          <div class="cart-wrapper">
            <span class="cart-title">
              <i class="fa fa-check-square text-danger"></i>
            </span>
            <div class="cart-content">
              <span>Đơn hàng hôm nay</span>
              <span class="cart-counter">5</span>
            </div>
          </div>
        </el-card>
      </div>
      <div class="col-3">
        <el-card shadow="none" color="success">
          <div class="cart-wrapper">
            <span class="cart-title">
              <i class="fa fa-bar-chart text-success"></i>
            </span>
            <div class="cart-content">
              <span>Tổng doanh thu</span>
              <span class="cart-counter">{{ 22199000 | vietnamdong }}</span>
            </div>
          </div>
        </el-card>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12">
        <span class="text-header">Thống kê đơn hàng trong 30 gần nhất</span>
        <el-card shadow="none">
          <LineChart />
        </el-card>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-6">
        <span class="text-header">Đơn hàng gần đây</span>
        <el-card shadow="none">
          <recently-order />
        </el-card>
      </div>
      <div class="col-6">
        <span class="text-header">Tỉ lệ đơn hàng</span>
        <el-card shadow="none">
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
              <pie-chart />
            </div>
            <div class="col-2"></div>
          </div>
        </el-card>  
        <div class="mt-2"></div>
        <span class="text-header">Hoạt động gần đây</span>
        <el-card shadow="none"> 
          <span class="text-secondary">Không tìm thấy hoạt động nào</span>
        </el-card>
      </div>
    </div>
  </div>
</template>


<script> 
import LineChart from './components/line-chart.vue'
import PieChart from './components/pie.vue'
import RecentlyOrder from './components/recently-order.vue'

export default {
  name: 'DashboardView',
  components: { 
    LineChart,
    PieChart,
    RecentlyOrder,
  },
  data() {
    return { 
      
    }
  },
  methods: { 
  }
}

</script>

<style> 
.cart-wrapper {
  display: flex;
  justify-content: space-between;
}
.cart-title {
  font-size: 3rem;
  color: rgb(92, 92, 92);
}

.cart-content {
  display: flex;
  justify-content: space-between;
  flex-direction:column;
  text-align: right;
}
.cart-content span:nth-child(2) {
  font-weight: bold;
}

.cart-counter {
  font-size: 2rem;
  text-align: right;
}

.user-icon {
  color: rgb(71, 71, 71);
}

.text-header {
   font-size: 1rem;
   font-weight: bold;
}

</style>