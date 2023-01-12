<template>
  <div class="swatch-element color available" :class="getColor">
    <input 
      class="swatchInput" 
      type="radio" 
      :value="color.name"
      @click="setColor"
    >
    <label 
      class="swatchLbl large rounded" 
      :style="{ backgroundColor: getColor, borderColor: getBorderColor }"
      :title="color.name"
      @click="setColor"
    >
    </label>  
  </div>
</template>

<script>

export default {
  name: 'ProductVariantColor',
  props: ['color', 'isSelect'],
  computed: {
    getColor() {
      const colors = {
        green: 'green',
        white: 'white',
        blue: 'blue',
        yellow: 'yellow',
        black: 'black',
      }
      return colors[this.color.name.toLowerCase()] || 'gray';
    },
    getBorderColor() { 
      return this.isSelect ? '#ddd': '';
    }
  },
  methods: {
    setColor() {
      this.$emit('set-color', this.color);
    },
    
  }
}
</script>

<style scoped>
.selected {
  border-color: #000;
}
</style>