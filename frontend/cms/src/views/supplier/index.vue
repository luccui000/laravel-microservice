<template>
  <div>
    <router-link to="/products/create" class="mr-2">
      <el-button type="primary" size="small">Thêm mới</el-button>
    </router-link>
    <el-button type="primary" plain size="small">Xuất Excel</el-button>
    <div class="mt-3"></div>
    <el-table
      v-if="suppliers"
      :data="suppliers"
      style="width: 100%">
      <el-table-column
        prop="id"
        label="ID"
        sortable
        width="60"> 
      </el-table-column>
      <el-table-column
        prop="name"
        label="Tên nhà cung cấp" 
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
    <div class="mt-2"></div> 
  </div>
</template>


<script> 

export default {
  name: 'ProductView',
  data() {
    return {  
    }
  }, 
  mounted() { 
    this.$store.dispatch('supplier/getAll');
  },
  computed: { 
    suppliers() {
      return this.$store.state.supplier.suppliers;
    }
  },
  methods: { 
    handleDelete(index, row) {
      this.$confirm('Bạn có chắc chắn muốn xóa hay không ?', 'Warning', {
        confirmButtonText: 'OK',
        cancelButtonText: 'Hủy',
        type: 'warning',
        center: true
      }).then(() => {
        console.log(row)
        this.$store.dispatch('supplier/delete', row.id)
          .then(_ => {
            this.$store.dispatch('supplier/getAll');
          })
        this.$message({
          type: 'success',
          message: 'Xóa thành công'
        });
      }).catch(() => {
        this.$message({
          type: 'info',
          message: 'Lệnh xóa đã bị hủy'
        });
      });
    }
  }
}

</script>