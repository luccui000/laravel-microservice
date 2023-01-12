<template>
  <div class="swatch-element available" :class="getSize">
    <input 
      class="swatchInput" 
      type="radio"  
      :value="size"
      @click="setSize"
    >
    <label 
      class="swatchLbl medium rectangle"
      :title="size"
      @click="setSize"
    >
      {{ size.name  }}
    </label>
  </div>
</template>

<script>

export default {
  name: 'ProductVariantSize',
  props: ['size'],
  computed: {
    getSize() {
      console.log(this.size)
      const sizes = {
        XS: 'xs',
        M: 'm',
        S: 's',
        L: 'L',
        XL: 'xl',
        XXL: 'xxl',
      };

      return sizes[this.size.name.toUpperCase()] || 'm';
    }
  },
  methods: {
    setSize() {
      this.$emit('set-size', this.size);
    }
  }
}

</script>
