<template> 
  <div class="alert-wrapper" v-if="showAlert">
    <div 
      class="alert-content"
      :class="type"
    >{{ message }}</div>
  </div> 
</template>


<script>
import Alert from '@/libs/components/Alert'

export default {
  name: 'AlertLib',
  data() {
    return {
      showAlert: false,
      message: '',
      type: 'success'
    }
  },
  beforeMount() {
    Alert.events.$on('show', params => {
      this.message = params.message;
      this.type = params.type || 'success';
      this.showAlert = true;

      setTimeout(() => { 
        this.showAlert = false;  
      }, 3000)
    })
  }
}

</script>

<style> 

.alert-wrapper {
  position: fixed;
  top: 10px;
  right: 10px; 
} 
.alert-content {
  padding: 15px 10px;
  min-width: 300px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
  transition: .2s linear;
}

.success {
  border-left: 4px solid green;
}

</style>