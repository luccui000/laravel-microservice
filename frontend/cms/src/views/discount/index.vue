<template>
<div>
    <el-button @click="handleCreate" type="primary" size="small">Thêm mới</el-button> 
    <el-button type="primary" plain size="small">Xuất Excel</el-button>
    <div class="mt-3"></div>
    <el-table
      v-if="discounts"
      :data="discounts"
      style="width: 100%"
      row-key="id"
      default-expand-all
      > 
      <el-table-column
        prop="name"
        label="Tên"
        width="500" 
      > 
      <template v-slot="{ row }">
        <span :class="{ 'child': row.parent_id }">{{ row.name }}</span>
      </template>
      </el-table-column>
      <el-table-column
        prop="type"
        label="Loại ưu đãi"  
      >
      <template v-slot="{row}">
        {{ row.discount.type === 'percent' ? 'Phần trăm' : 'Giá trị'  }}
      </template>
      </el-table-column>
      <el-table-column
        prop="discount.value"
        label="Giá trị"
      > 
      <template v-slot="{row}">
        {{ row.discount.type === 'percent' ? row.discount.value + '%' : row.discount.value  }}
      </template>
      </el-table-column> 
      <el-table-column
        prop="discount.active_date"
        label="Ngày bắt đầu" 
      >  
      </el-table-column>
      <el-table-column
        label="">
        <template slot-scope="scope">
          <el-button
            size="mini"
            @click="handleEdit(scope.$index, scope.row)">
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
    <el-dialog
      :title="title"
      :visible.sync="centerDialogVisible"
      width="40%"
      >
      <div>
        <el-form label-width="200px"> 
          <el-form-item label="Tên" v-if="!isEdit">
            <el-col :span="11">
              <el-input v-model="title" size="small" ></el-input>
            </el-col>
          </el-form-item>
          <el-form-item label="Loại ưu đãi">
            <el-select size="small" v-model="discount.type" placeholder="Chọn gía trị">
              <el-option label="Phần trăm" value="percent">Phần trăm</el-option>
              <el-option label="Giá trị" value="amount">Giá trị</el-option>
            </el-select>
          </el-form-item>
          <el-form-item label="Giá trị ưu đãi">
            <el-col :span="11">
              <el-input v-model="discount.value" size="small"></el-input>
            </el-col>
          </el-form-item>
          <el-form-item label="Ngày bắt đầu áp dụng">
            <el-col :span="11">
              <el-date-picker
                v-model="discount.active_date" 
                placeholder="Chọn ngày bắt đầu áp dụng"
                size="small"
                >
              </el-date-picker>
            </el-col>
          </el-form-item>
        </el-form>
      </div>
      <span slot="footer" class="dialog-footer">
        <el-button size="medium" @click="centerDialogVisible = false">Hủy</el-button>
        <el-button type="primary" size="medium" @click="handleSave">Lưu</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>

export default {
  name: 'DiscountView',
  data() {
    return {
      centerDialogVisible: false,
      isEdit: false,
      title: '',
      editId: null,
      discount: {
        customer_category_id : null,
        type: null,
        value: 0,
        active_date: null
      }
    };
  },
  mounted() {
    this.$store.dispatch('discount/getAll')
  },
  computed: {
    discounts() {
      return this.$store.state.discount.discounts;
    }
  },
  methods: {
    handleCreate() {
      this.title = '';
      this.discount.customer_category_id = '';
      this.discount.type = '';
      this.discount.value = '';
      this.discount.active_date = '';
      this.editId = null;
      this.centerDialogVisible = true;
    },
    handleEdit(index, row) {
      this.centerDialogVisible = true;
      this.title = row.name;
      this.isEdit = true;
      this.discount.customer_category_id = row.discount.customer_category_id;
      this.discount.type = row.discount.type;
      this.discount.value = row.discount.value;
      this.discount.active_date = row.discount.active_date;
      this.editId = row.discount.id;
    },
    handleSave() {
      if(this.isEdit) {
        this.$store.dispatch('discount/update', {
          params: this.discount,
          id: this.editId
        })
        .then(response => {
            this.$store.dispatch('discount/getAll')
            this.centerDialogVisible = false;
            this.isEdit = false;
          })
      } else {
        this.$store.dispatch('discount/store', {
          name: this.title,
          type: this.discount.type,
          value: this.discount.value,
          active_date: this.discount.active_date,
        })
      }
    },
    handleDelete(index, row) {

    }
  },
  watch: {
    centerDialogVisible: function(value) {
      if(value === false) {
        this.isEdit = false;
      }
    }
  }
}

</script>

<style> 

.child {
  margin-left: 30px;
}

</style>