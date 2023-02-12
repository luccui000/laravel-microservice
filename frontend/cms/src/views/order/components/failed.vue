<template>
  <div>
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
            {{ props.row.order_date | dmy }}
          </template>
        </el-table-column>
        <el-table-column label="Tổng tiền">
          <template slot-scope="props">
            {{  props.row.total | vietnamdong }}
          </template>
        </el-table-column> 
      </el-table>
    </div>
    <div v-else>
      Chưa có đơn hàng nào.
    </div>
  </div>
</template>

<script> 

export default {
  name: 'FailedOrderComponent',
  props: ['orders'],
  data() {
    return {};
  },
  mounted() {   
  },
  computed: { 
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