<template>
  <div>
    <router-link to="/products/create" class="mr-2">
      <el-button type="primary" size="small">Thêm mới</el-button>
    </router-link>
    <el-button type="primary" plain size="small">Xuất Excel</el-button>
    <div class="mt-3"></div>
    <el-table
      v-if="products"
      :data="products.filter(data => !search || data.name.toLowerCase().includes(search.toLowerCase()))"
      style="width: 100%">
      <el-table-column
        prop="id"
        label="ID"
        sortable
        width="60"> 
      </el-table-column>
      <el-table-column
        prop="name"
        label="Tên sản phẩm"
        width="500"
        sortable
      >
      </el-table-column>
      <el-table-column
        prop="category.name"
        label="Danh mục">
      </el-table-column>
      <el-table-column
        prop="supplier.name"
        label="Nhà cung cấp"
        width="150"
        sortable
      >
      </el-table-column>
      <el-table-column
        prop="price"
        label="Giá bán"
        width="300"
        sortable
      >
        <template v-slot="{row}">
          {{ row.min_price | vietnamdong }} - {{ row.max_price | vietnamdong }}
        </template>
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
    <el-pagination
      background
      layout="prev, pager, next"
      :total="totalPage"
      @current-change="pageChange"
      >
    </el-pagination>
    <el-dialog
      v-if="product"
      :title="product.name"
      :visible.sync="dialogVisible"
      width="70%"
      @before-close="handleBeforeClose"
    >
      <span>{{ product.name  }}</span>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">Hủy</el-button>
        <el-button type="primary" @click="dialogVisible = false">Lưu</el-button>
      </span>
    </el-dialog>
  </div>
</template>


<script> 

export default {
  name: 'ProductView',
  data() {
    return { 
      search: '',
      dialogVisible: false,
      product: null,
      isEdit: false,
    }
  }, 
  mounted() {
    this.$store.dispatch('product/getAllProduct')
  },
  computed: {
    products() {
      return this.$store.getters['product/getAllProduct'];
    },
    totalPage() {
      return this.$store.getters['product/getTotalPage'];
    }
  },
  methods: {
    handleEdit(_, row) { 
      this.isEdit = true;
      this.product = row;
      this.dialogVisible = true;
    },
    handleDelete(index, row) { 
      this.$router.push(`/products/update/${row.id}`)
    },
    pageChange(page) { 
      this.$store.dispatch('product/getAllProduct', page)
    },
    handleBeforeClose() {
      this.isEdit = false;
    }
  }
}

</script>