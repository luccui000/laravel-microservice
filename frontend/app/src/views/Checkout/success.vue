<template>
  <div>
    <div class="page section-header text-center">
      <div class="page-title">
        <div class="wrapper"><h1 class="page-width">Thanh toán thành công</h1></div>
      </div>
    </div> 
    <footer id="footer" class="footer-2">
      <new-letter></new-letter>
      <page-footer></page-footer>
    </footer>
  </div>
</template>

<script> 

export default {
  name: 'CheckoutSuccess',
  components: { 
  },
  data() {
    return { 
    }
  },
  mounted() { 
  },
  computed: { 
  },
  methods: { 
  }
}
</script>

<style scoped>
.btn--small-wide {
  width: 100%;
  padding: 10px 5px;
}
.btn-secondary {
  color: #000;
}

.btn-secondary:hover {
  color: #fff;
}

.coupon-input {
  width: 200px;
}

</style>