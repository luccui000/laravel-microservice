<template>
  <div>
    <div v-if="orders.length">
      <el-table
        :data="orders"
        style="width: 100%">
        <el-table-column type="expand">
          <template slot-scope="props" >
            <div style="margin-left: 50px"> 
              <p>Tên khách hàng: <strong>{{ props.row.customer.name }}</strong></p>
              <p>Số điện thoại đặt hàng: <strong>{{ props.row.phone }}</strong></p>
              <p>Địa chỉ: <strong>{{ props.row.address }}</strong></p>
            </div>
          </template>
        </el-table-column>
        <el-table-column label="Mã số" prop="order_number" > 
          <template slot-scope="scope">
            <router-link :to="`/orders/${scope.row.id}`">{{ scope.row.order_number }}</router-link>
          </template>
        </el-table-column>
        <el-table-column label="Tên người đặt" prop="customer.name" > 
        </el-table-column>
        <el-table-column label="SDT đặt hàng" prop="phone" > 
        </el-table-column>
        <el-table-column label="Ngày đặt">
          <template slot-scope="props">
            {{ props.row.order_date | dmy }}
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
              type="danger"
              @click="handleProcess(scope.$index, scope.row)">
              Đã thất bại
            </el-button>
            <el-button
              v-else-if="scope.row.status == 'canceled'"
              size="mini" 
              disabled
              type="warning"
              @click="handleProcess(scope.$index, scope.row)">
              Đã hủy
            </el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>
    <div v-else>Loading...</div>
  </div>
</template>

<script> 

export default {
  name: 'AllOrderComponent',
  props: ['orders'],
  data() {
    return { 
    };
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