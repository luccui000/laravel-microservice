<template>
  <div>
    <div class="row">
      <div class="col-3">
        <el-card shadow="none">
          
        </el-card>
      </div>
      <div class="col-3">
        <el-card shadow="none"></el-card>
      </div>
      <div class="col-3">
        <el-card shadow="none"></el-card>
      </div>
      <div class="col-3">
        <el-card shadow="none"></el-card>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <LineChart />
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