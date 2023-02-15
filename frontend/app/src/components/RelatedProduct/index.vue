<template>
  <div class="related-product grid-products">
    <header class="section-header">
      <h2 class="section-header__title text-center h2">
        <span>Các sản phẩm liên quan</span>
      </h2>
      <p class="sub-heading">Các sản phẩm liên quan được lấy từ dữ liệu thuộc cùng một loại danh mục</p>
    </header>
    <div v-if="product.related">
      <vue-slick-carousel v-bind="settings" class="productPageSlider row">
        <related-product-item
          v-for="related in product.related"
          :key="related.id"
          :product="related"
        /> 
      </vue-slick-carousel>  
    </div>
  </div>
</template>

<script>
import RelatedProductItem from "@/components/RelatedProduct/item";
import VueSlickCarousel from "vue-slick-carousel";

export default {
  name: 'RelatedProduct',
  components: {RelatedProductItem, VueSlickCarousel},
  data() {
    return {
      settings: {
        dots: true,
        focusOnSelect: true,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 3,
        touchThreshold: 5
      }
    }
  },
  computed: {
    product() {
      return this.$store.getters['product/getProduct'];
    }
  },
  methods: {
    addToCart() { 
      let has_variant = this.product.has_variant;

      this.$store.dispatch('order/addToCart', {
        product_id: this.product.id,
        sku_id: has_variant ? this.item.sku_id : null,
        qty: this.quantity
      }).then(() => { 
        this.$notify({
          group: 'alert',
          title: 'Thành công',
          text: 'Thêm vào giỏ hàng thành công',
          type: 'success'
        })
      })
    }
  }
}
</script>

<style scoped>

</style>