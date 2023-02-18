<template>
  <div>
    <router-link to="/customers/create" class="mr-2">
      <el-button type="primary" size="small">Thêm mới</el-button>
    </router-link>
    <el-button type="primary" plain size="small">Xuất Excel</el-button>
    <div class="mt-3"></div> 
    <el-table
      v-if="customers"
      :data="customers"
      style="width: 100%">
      <el-table-column
        prop="id"
        label="ID"
        sortable
        width="60"> 
      </el-table-column>
      <el-table-column
        prop="name"
        label="Họ tên" 
        sortable
      > 
      </el-table-column>

      <el-table-column
        prop="phone"
        label="Số điện thoại" 
        sortable
      > 
      </el-table-column>

      <el-table-column
        prop="email"
        label="Email" 
        sortable
      > 
      </el-table-column>
      <el-table-column
        prop="name"
        label="Ngày lập" 
        sortable
      > 
      <template slot-scope="scope">
        <span>{{ scope.row.created_at | dmy  }}</span>
      </template>
      </el-table-column>
      <el-table-column
        prop="category.name"
        label="Nhóm khách hàng" 
        sortable
      >  
      </el-table-column>
      <el-table-column align="right" width="300"> 
        <template slot-scope="scope">
          <el-button
            size="mini"
            @click="handleEdit(scope.$index, scope.row)">
            <i class="fa fa-eye"></i>
          </el-button>
          <el-button
            size="mini"
            type="warning"
            @click="handleDelete(scope.$index, scope.row)">
            <i class="fa fa-pencil"></i>
          </el-button>
          <el-button
            size="mini"
            type="danger"
            @click="handleDelete(scope.$index, scope.row)">
            <i class="fa fa-trash"></i>
          </el-button>
        </template>
      </el-table-column>
    </el-table>  
    <el-pagination
      background
      layout="prev, pager, next"
      :total="totalPage" 
      >
    </el-pagination>
    <div class="mt-2"></div> 
  </div>
</template>


<script> 

export default {
  name: 'CustomerView',
  data() {
    return {  
    }
  }, 
  beforeMount() {  
    this.$store.dispatch('customer/getAll')
  },
  computed: {  
    customers() {
      return this.$store.state.customer.customers.data;
    },
    totalPage() {
      return this.$store.state.customer.customers.total;
    }
  },
  methods: {  
  }
}

</script>