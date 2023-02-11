<template>
  <div v-if="orders.length">
    <el-table
      :data="orders"
      style="width: 100%">
      <el-table-column type="expand">
        <template slot-scope="props" >
          <div style="margin-left: 50px"> 
            <p>City: {{ props.row.city }}</p>
            <p>Address: {{ props.row.address }}</p>
            <p>Zip: {{ props.row.zip }}</p>
          </div>
        </template>
      </el-table-column>
      <el-table-column label="Mã số" prop="order_number" > 
      </el-table-column>
      <el-table-column label="Tên người đặt" prop="customer.name" > 
      </el-table-column>
      <el-table-column label="Ngày đặt">
        <template slot-scope="props">
          {{ props.row.updated_at | dmy }}
        </template>
      </el-table-column>
      <el-table-column label="Tổng tiền">
        <template slot-scope="props">
          {{  props.row.total | vietnamdong }}
        </template>
      </el-table-column>
      <el-table-column 
        label="Trạng thái"
        :filters="[
          { text: 'Hoàn thành', value: 'success' }, 
          { text: 'Đang chờ xác nhận', value: 'pending' },
          { text: 'Bị hủy', value: 'failed' },
        ]"
      >
        <template slot-scope="props">
          <p class="status" :data-status="props.row.status"></p>
        </template>
      </el-table-column>
      <el-table-column>
        <template slot-scope="scope">
          <el-button
            v-if="scope.row.status == 'pending'"
            size="mini"
            @click="handleProcess(scope.$index, scope.row)">
            Xác nhận
          </el-button>
          <el-button
            v-else-if="scope.row.status == 'success'"
            size="mini"
            disabled
            @click="handleProcess(scope.$index, scope.row)">
            Đã xác nhận
          </el-button>
          <el-button
            v-else-if="scope.row.status == 'failed'"
            size="mini"
            disabled
            @click="handleProcess(scope.$index, scope.row)">
            Đã bị hủy
          </el-button>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script> 

export default {
  name: 'AllOrderComponent',
  data() {
    return {};
  },
  beforeMount() {
    this.$store.dispatch('order/getOrders', 'all')
  },
  computed: {
    orders() {
      return this.$store.state.order.orders;
    }
  },
  methods: {
    handleProcess(index, row) {

    }
  }
}

</script>

<style>

.status {
  border-radius: 10px;
  padding: 3px 5px;
  width: 70px;
}

.status[data-status="success"] {
  background-color: #67C23A;
  color: #fff;
}

.status[data-status="failed"] {
  background-color: #F56C6C;
}

.status[data-status="pending"] {
  background-color: #E6A23C;
}

</style>