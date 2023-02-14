<template> 
  <div class="notification-bar mobilehide" v-show="showNotification">
    <router-link to="/products" class="notification-bar__message">Giảm giá 20% cho tất cả đơn hàng đầu tiên</router-link>
      <span class="close-announcement" @click="closeNotification">&times;</span>
  </div>
</template>

<script> 

export default {
  name: 'NotificationBar',
  computed: {
    showNotification() {
      return this.$store.state.showNotification;
    }
  },
  methods: {
    closeNotification() {
      this.$store.dispatch('showNotification')
    }
  }
}
</script>