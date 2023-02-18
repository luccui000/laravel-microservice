<template>
  <div class="row">
    <!-- <div class="col-12">
      <el-button @click="handleCreate" type="primary" size="small">Thêm mới</el-button>  
    </div> -->
    <div class="col-12 mt-3">
      <el-form label-position="top">
        <el-row>
          <el-col :span="24">
            <el-tabs type="border-card">
              <el-tab-pane label="Thông tin mã giảm giá">
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-6">
                        <el-form-item label="Tên coupon">
                          <el-input v-model="coupon.name" size="medium" ></el-input>
                        </el-form-item>
                      </div>
                      <div class="col-6">
                        <el-form-item label="Mã coupon">
                          <el-input v-model="coupon.code" size="medium" ></el-input>
                        </el-form-item>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <el-form-item label="Giảm giá theo"> 
                          <el-select placeholder="Chọn giá trị" v-model="coupon.discount_type" size="medium">
                            <el-option label="Phần trăm" value="percent">Phần trăm</el-option>
                            <el-option label="Giá trị" value="amount">Giá trị</el-option>
                          </el-select>
                        </el-form-item>
                      </div>
                      <div class="col-4">
                        <el-form-item label="Giá trị" v-if="coupon.discount_type == 'amount'">
                          <el-input placeholder="0" min="0" max="10000000000" type="number" step="10000" v-model="coupon.discount_value" size="medium" ></el-input>
                        </el-form-item>
                        <el-form-item label="Giá trị" v-else>
                          <el-input placeholder="0" min="0" max="100" type="number" step="1" v-model="coupon.discount_value" size="medium" ></el-input>
                        </el-form-item> 
                      </div>
                      <div class="col-4">
                        <el-form-item label="Trạng thái">
                          <el-select placeholder="Chọn giá trị" v-model="coupon.status" size="medium">
                            <el-option label="Bật" value="1">Bật</el-option>
                            <el-option label="Tắt" value="0">Tắt</el-option>
                          </el-select>
                        </el-form-item> 
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                  </div>
                </div>
              </el-tab-pane>
              <el-tab-pane label="Sản phẩm">
                <el-row> 
                  <el-col :span="24">
                    <el-form-item label="Mã giảm giá sẽ áp dụng"> 
                      <el-select placeholder="Chọn giá trị" v-model="product.is_specify_product" size="medium">
                        <el-option label="Sản phẩm chỉ định" value="1">Sản phẩm chỉ định</el-option>
                        <el-option label="Danh mục sản phẩm" value="2">Danh mục sản phẩm</el-option> 
                      </el-select>
                    </el-form-item>
                  </el-col>
                </el-row> 
                <el-row v-if="showProduct">
                  <el-col :span="24"> 
                    <el-form-item label="Sản phẩm sẽ được áp dụng" label-width="400">
                      <el-select placeholder="Chọn giá trị" 
                        v-model="product.products" 
                        multiple=""
                        size="medium"
                        class="select-product"
                        > 
                        <el-option 
                          v-for="product in products" 
                          :key="product.id"
                          :label="product.name"
                          :value="product.id"
                        >
                          {{ product.name }}
                        </el-option>
                      </el-select>
                    </el-form-item>
                  </el-col>
                </el-row> 
                <el-row v-else>
                  <el-col :span="24"> 
                    <el-form-item label="Danh mục sẽ được áp dụng" label-width="400">
                      <el-select placeholder="Chọn giá trị" 
                        v-model="product.categories" 
                        multiple=""
                        size="medium" 
                        class="select-product"
                        > 
                        <el-option 
                          v-for="category in categories" 
                          :key="category.id"
                          :label="category.name"
                          :value="category.id"
                        >
                          {{ category.name }}
                        </el-option>
                      </el-select>
                    </el-form-item>
                  </el-col>
                </el-row> 
              </el-tab-pane>
              <el-tab-pane label="Thiết lập">
                <el-row>
                  <el-col :span="12">
                    <el-form-item label="Thời gian bắt đầu">
                      <el-select placeholder="Thời gian bắt đầu" size="medium" v-model="discount_expired">
                        <el-option value="0" label="Sau khi tôi bật nó">Sau khi tôi bật nó</el-option>
                        <el-option value="1" label="Thiết lập ngày">Thiết lập ngày</el-option>
                      </el-select>
                    </el-form-item>
                  </el-col>
                  <el-col :span="12">
                    <el-form-item label="Thiết lập ngày" v-if="discount_expired == 1">
                      <el-date-picker placeholder="Thiết lập ngày" type="datetime" size="medium" v-model="setting.from"></el-date-picker>
                    </el-form-item>
                  </el-col>
                </el-row>
                <el-row>
                  <el-col :span="12">
                    <el-form-item  label="Thời gian hết hạn">
                      <el-select placeholder="Thời gian hết hạn" size="medium" v-model="discount_after">
                        <el-option value="1" label="Sau 1 ngày">Sau 1 ngày</el-option>
                        <el-option value="2" label="Sau 1 tuần">Sau 1 tuần</el-option>
                        <el-option value="3" label="Sau 1 tháng">Sau 1 tháng</el-option>
                        <el-option value="4" label="Thiết lập ngày">Thiết lập ngày</el-option>
                      </el-select>
                    </el-form-item>
                  </el-col>
                  <el-col :span="12">
                    <el-form-item label="Thiết lập ngày" v-if="discount_after == 4">
                      <el-date-picker placeholder="Thiết lập ngày" type="datetime" v-model="setting.to"></el-date-picker>
                    </el-form-item>
                  </el-col>
                </el-row>
              </el-tab-pane> 
            </el-tabs>
          </el-col>
        </el-row>
        <div class='my-3'></div>
        <el-row>
          <el-col :span="24">
            <el-button type="success" @click="handleCreate" size="medium">Thêm</el-button>
          </el-col>
        </el-row>
      </el-form> 
    </div>
  </div>
</template>


<script>   

export default {
  name: 'CouponView',
  components: {   
  },
  data() {
    return {
      coupon: {
        name: '',
        code: '',
        status: '',
        discount_type: '',
        discount_value: '',
      },
      setting: {
        from: '',
        to: '',

      },
      product: {
        is_specify_product: 1,
        products: [],
        categories: [],
      },
      showProduct: false,
      discount_after: null,
      discount_expired: null,
      showTo: false,
      isPercent: true
    }
  },
  mounted() {
    this.$store.dispatch('product/getAll')
    this.$store.dispatch('category/getAll')
  },
  methods: {
    handleCreate() {
      const data = {
        ...this.coupon,
        ...this.setting,
        ...this.product,
        discount_after: this.discount_after,
        discount_expired: this.discount_expired
      }
      console.log(data)
    }
  },
  computed: {
    products() {
      return this.$store.state.product.products;
    },
    categories() {
      return this.$store.state.category.categories;
    }
  },
  watch: {
    product:  {
      handler(newValue) { 
        if(newValue.is_specify_product == 1) {
          this.showProduct = true;
        } else {
          this.showProduct = false;
        } 
      }, deep: true
    }
  }
}

</script>

<style>
.el-form-item__label {
  margin-bottom: 0 !important;
}
.select-product {
  min-width: 500px;
}
</style>