<template> 
  <div class="notification-bar mobilehide" v-show="showNotification">
    <a href="#" class="notification-bar__message">20% off your very first purchase, use promo code: belle fashion</a>
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