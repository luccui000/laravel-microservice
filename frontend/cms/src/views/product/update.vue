<template>
  <div>
    <el-card shadow="never">  
      <el-form v-if="editProduct" :model="editProduct">
        <div class="row">
          <div class="col-8">
            <el-form-item label="Tên sản phẩm" prop="name" >
              <el-input v-model="editProduct.name" size="medium" ></el-input>
            </el-form-item>
            <el-form-item label="Mô tả" prop="name" >
              <el-input v-model="editProduct.description" size="medium" ></el-input>
            </el-form-item>
            <div class="my-3"></div>  
            <el-select v-model="editProduct.category_id" class="mr-2" placeholder="Chọn danh mục" size="medium">
              <el-option
                v-for="item in categories"
                :key="item.id"
                :label="item.name"
                :value="item.id"
                >
              </el-option>
            </el-select>
            <el-select v-model="editProduct.supplier_id" class="mr-2" placeholder="Chọn danh mục" size="medium">
              <el-option
                v-for="item in suppliers"
                :key="item.id"
                :label="item.name"
                :value="item.id"
                >
              </el-option>
            </el-select>
            <el-select v-model="editProduct.brand_id" class="mr-2" placeholder="Chọn danh mục" size="medium">
              <el-option
                v-for="item in brands"
                :key="item.id"
                :label="item.name"
                :value="item.id"
                >
              </el-option>
            </el-select>
            <div class="my-3"></div>
            <el-checkbox v-model="editProduct.is_hot">Sản phẩm hot</el-checkbox> 
            <el-checkbox v-model="editProduct.is_new">Sản phẩm mới</el-checkbox> 
            <el-checkbox v-model="editProduct.is_unlimited">Số lượng không giới hạn</el-checkbox>  
            <div class="my-3"></div> 
            <l-editor
              api-key="l01e87n2t3uzm6jo5u43oj02bsloetedndype5nuj1dl4xuf"
              v-model="editProduct.long_description"
              :init="{
                height: 500,
                menubar: false,
                plugins: [
                  'advlist autolink lists link image charmap print preview anchor',
                  'searchreplace visualblocks code fullscreen',
                  'insertdatetime media table paste code help wordcount'
                ],
                toolbar:
                  'undo redo | formatselect | bold italic backcolor | \
                  alignleft aligncenter alignright alignjustify | \
                  bullist numlist outdent indent | removeformat | help'
              }"
            />
            <div class="my-3"></div> 
            <el-checkbox v-model="editProduct.has_variant">Biến thể sản phẩm</el-checkbox>
            <div class="my-3"></div>
            <div class="d-flex" v-if="editProduct.has_variant">
              <el-form-item label="Màu sắc" prop="name" class="mr-3" >
                <el-select
                  size="medium"
                  v-model="mColors"
                  multiple
                  placeholder="Chọn màu sắc"
                  style="width: 300px"
                >
                  <el-option
                    v-for="item in colors"
                    :key="item.name"
                    :label="item.name"
                    :value="item.name"
                  />
                </el-select>
              </el-form-item>
              <el-form-item label="Kích cỡ" prop="name" >
                <el-select
                  size="medium"
                  v-model="mSizes"
                  multiple
                  placeholder="Chọn kích cỡ"
                  style="width: 240px"
                >
                  <el-option
                    v-for="item in sizes"
                    :key="item.name"
                    :label="item.name"
                    :value="item.name"
                  />
                </el-select>
              </el-form-item>
            </div>
            <div class="" v-else> 
              <div class="row">
                <div class="col-6">
                  <el-form-item label="Giá sản phẩm" prop="name" >
                    <el-input v-model="editProduct.price" size="medium" ></el-input>
                  </el-form-item>
                </div>
                <div class="col-6">
                  <el-form-item label="Giá sản phẩm" prop="name" >
                    <el-input v-model="editProduct.sell_price" size="medium" ></el-input>
                  </el-form-item>
                </div>
              </div>
            </div>
            <set-price   
              v-if="mColors.length && mSizes.length"
              :colors="mColors" 
              :sizes="mSizes" 
              :a="mPrices"
              @update-price="updatePrice"
            />
          </div>
          <div class="col-4">
            <el-card>  
              <label for="choose-file" class="upload-image" >
                <img v-if="url" :src="url" class="image-src" /> 
                <input type="file" hidden id="choose-file" @change="onFileChange" />
              </label> 
              <div class="my-3"></div>
              <div class="row">
                <div class="col-12">
                  <span>Tags</span>
                </div> 
              </div>
              <div class="row">
                <div class="col-12">
                  <el-select
                    size="medium"
                    v-model="editProduct.tags"
                    multiple
                    placeholder="Chọn tags" 
                  >
                    <el-option
                      v-for="item in tags"
                      :key="item.id"
                      :label="item.name"
                      :value="item.name"
                    />
                  </el-select>
                </div>
              </div>
              <div class="my-3"></div>
              <el-button type="success" @click="handleSave" size="medium">Thêm mới</el-button>
            </el-card>
          </div>
        </div>
        <div class="my-3"></div>  
      </el-form>
    </el-card>
  </div>
</template>


<script>

import SetPrice from './components/set-price.vue'

export default {
  name: 'ProductCreateView',
  components: {
    SetPrice
  },
  data() {
    return {
      editId: null,
      product: {
        name: '',
        description: '',
        long_description: '',
        is_hot: false,
        is_new: false,
        is_unlimited: false,
        category_id: null,
        brand_id: null,
        supplier_id: null,
        colors: null,
        sizes: null,
        image: '',
        has_variant: false,
        price: 0,
        sell_price: 0,
        tags: []
      },
      mSizes: [],
      mColors: [],
      mPrices: [],
      dialogImageUrl: '',
      dialogVisible: false,
      url: ''
    }
  },
  mounted() {
    this.editId = this.$route.params.id;
    this.$store.dispatch('product/getAttribute')
    this.$store.dispatch('brand/getAll')
    this.$store.dispatch('supplier/getAll')
    this.$store.dispatch('category/getAll')
    this.$store.dispatch('product/getProductById', this.editId)
      .then(response => {
        let { skus } = response;
        console.log(skus)
        let xcolors = [];
        let xsizes = [];
        for(let sku of skus) { 
          xsizes.push(sku?.size?.name)
          xcolors.push(sku?.color?.name)
          this.mPrices.push(sku.price);
        } 
        this.mColors = [...new Set(xcolors)];
        this.mSizes = [...new Set(xsizes)]; 
      })
  },
  computed: {
    editProduct() {
      return this.$store.state.product.product;
    },
    brands() {
      return this.$store.state.brand.brands;
    },
    suppliers() {
      return this.$store.state.supplier.suppliers;
    },
    categories() {
      return this.$store.state.category.categories;
    },
    colors() {
      return this.$store.state.product.colors;
    },
    sizes() {
      return this.$store.state.product.sizes;
    },
    tags() {
      return this.$store.state.product.tags;
    },
    skus() {  
      let items = [];
      for(let color of this.colors) {
        for(let size of this.sizes) {
          items.push({
            key: `${color}/${size}`,
            value: null
          });
        }
      }
      return items;
    }
  },
  methods: {
    handleSave() {
      const data = {
        ...this.product,
        colors: this.mColors,
        sizes: this.mSizes,
        prices: this.mPrices
      }
       
      this.$store.dispatch('product/create', data)
        .then(response => {
          console.log(response)
        }) 
    },
    updatePrice(prices) { 
      this.mPrices = prices;
    },
    handleRemove(file) {
      console.log(file);
    },
    handlePictureCardPreview(file) {
      this.dialogImageUrl = file.url;
      this.dialogVisible = true;
    },
    handleDownload(file) {
      console.log(file);
    },
    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
      let reader = new FileReader(); 
      
      reader.onloadend = () => {
        this.product.image = reader.result;
      }

      reader.readAsDataURL(file); 
    }
  }
}

</script>

<style>

label {
  margin-bottom: 0;
}
.el-form-item {
  margin-bottom: 0;
}

.upload-image {
  width: 200px;
  height: 200px;
  border-radius: 2px;
  border: 1px dashed #eee;
}
.image-src {
  width: 100%;
  height: 100%;
}
</style>