<template>
  <div>
    <div class="row">
      <div class="col-3">
        <el-card shadow="none">
          <div class="cart-wrapper">
            <span class="cart-title">
              <i class="fa fa-user"></i>
            </span>
            <div class="cart-content">
              <span>Người dùng</span>
              <span class="cart-counter">10</span>
            </div>
          </div>
        </el-card>
      </div>
      <div class="col-3">
        <el-card shadow="none">
          <div class="cart-wrapper">
            <span class="cart-title">
              <i class="fa fa-user"></i>
            </span>
            <div class="cart-content">
              <span>Người dùng</span>
              <span class="cart-counter">10</span>
            </div>
          </div>
        </el-card>
      </div>
      <div class="col-3">
        <el-card shadow="none">
          <div class="cart-wrapper">
            <span class="cart-title">
              <i class="fa fa-user"></i>
            </span>
            <div class="cart-content">
              <span>Người dùng</span>
              <span class="cart-counter">10</span>
            </div>
          </div>
        </el-card>
      </div>
      <div class="col-3">
        <el-card shadow="none">
          <div class="cart-wrapper">
            <span class="cart-title">
              <i class="fa fa-user"></i>
            </span>
            <div class="cart-content">
              <span>Người dùng</span>
              <span class="cart-counter">10</span>
            </div>
          </div>
        </el-card>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12">
        <span>Thống kê đơn hàng trong 30 gần nhất</span>
        <el-card shadow="none">
          <LineChart />
        </el-card>
      </div>
    </div>
  </div>
</template>


<script> 
import LineChart from './components/line-chart.vue'

export default {
  name: 'DashboardView',
  components: { 
    LineChart
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
  font-size: 4rem;
  color: rgb(92, 92, 92);
}

.cart-content {
  display: flex;
  justify-content: space-between;
  flex-direction:column;
}
.cart-counter {
  font-size: 3rem;
  text-align: right;
}

</style>