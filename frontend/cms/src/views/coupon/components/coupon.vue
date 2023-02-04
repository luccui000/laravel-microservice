<template>
  <div class="row">
    <div class="col-6">
      <el-form>
        <el-form-item label="Tên coupon">
          <el-input @input="updateCouponName"></el-input>
        </el-form-item>
      </el-form>
    </div>
    <div class="col-6"></div>
  </div>
</template>


<script>

export default {
  name: 'CouponComponent',
  props: ['coupon'],
  model: {
    prop: 'coupon',
    event: 'change'
  },
  data() {
    return {
      
    }
  },
  methods: {
    updateCouponName(event) { 
      this.$emit('change');
    }
  }
}

</script>