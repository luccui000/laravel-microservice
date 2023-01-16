<template>
  <div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow: hidden auto;">
    <div class="mfp-container mfp-s-ready mfp-inline-holder">
      <div class="mfp-content">
        <div id="productInquiry">
          <div class="contact-form form-vertical">
            <div class="page-title mb-4">
              <h3>{{ product.name }}</h3>
            </div>
            <div class="contact-form"> 
              <div class="formFeilds"> 
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <input v-model="contact.name" type="text" placeholder="Tên" value="" required="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <input v-model="contact.email" type="email" placeholder="Email" autocapitalize="off" value="" required="">
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <input v-model="contact.phone_number" type="text" pattern="[0-9\-]*" placeholder="Số điện thoại" value="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <textarea v-model="contact.message" required="" rows="10" placeholder="Nội dung"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div @click="sendMessage" class="btn">Gửi liên hệ</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button 
            @click="closeContact"
            title="Close (Esc)" 
            type="button" 
            class="mfp-close">×</button>
        </div>
      </div>
      <div class="mfp-preloader">Loading...</div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'AskProduct',
  props: ['product'],
  data() {
    return {
      contact: {
        name: '',
        email: '',
        phone_number: '',
        message: ''
      }
    }
  },
  methods: {
    closeContact() {
      this.$emit('close');
    },
    async sendMessage() {
      console.log(this.contact)
    }
  }
}
</script>