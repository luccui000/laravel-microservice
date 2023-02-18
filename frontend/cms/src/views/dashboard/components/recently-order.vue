<template>
  <div>
    <el-table
      v-if="orders"
      :data="orders"
      style="width: 100%"  
      :cell-style="{padding: '0px', height: '50px'}"
      > 
      <el-table-column
        prop="order_number"
        label="Mã đơn hàng" 
  
        sortable
      >
      </el-table-column>
      <el-table-column
        prop="customer.name"
        label="Khách hàng"
        sortable>  
      </el-table-column>
      <el-table-column
        prop="total"
        label="Tổng tiền" 
        sortable
      >
      <template slot-scope="scope">
        {{  scope.row.total | vietnamdong }}
      </template>
      </el-table-column>
      <el-table-column >
        <template slot-scope="scope">
          <span :class="scope.row.status" v-if="scope.row.status == 'success'">Đã xác nhận</span>
          <span :class="scope.row.status" v-if="scope.row.status == 'pending'">Đang chờ...</span>
          <span :class="scope.row.status" v-if="scope.row.status == 'failed'">Bị lỗi...</span>
          <span :class="scope.row.status" v-if="scope.row.status == 'cancelled'">Đã hủy...</span>
        </template>
      </el-table-column>
      <el-table-column align="right" width="70"> 
        <template slot-scope="scope">
          <el-link
            size="mini"
            @click="handleEdit(scope.$index, scope.row)">
            <i class="fa fa-eye"></i>
          </el-link>
          </template>
        </el-table-column>
    </el-table>
  </div>
</template>


<script>

export default {
  name: 'RecentlyOrderComponent',
  data() {
    return {}
  },
  computed: {
    orders() {
      return this.$store.getters['dashboard/recentlyOrder'] || [];
    }
  }
}

</script>

<style>
.el-badge__content {
  top: -10px;
}

.success {
  color: #67C23A;
}

.pending {
  color: #E6A23C;
}

.failed {
  color: #F56C6C;
}

.cancelled {
  color: #909399;
}

</style>