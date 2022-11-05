<template>
  <div id="app">
    <transition>
      <component :is="layout" v-if="layout" ></component>
    </transition>
    <router-view />
  </div>
</template>

<script>  
import { defaultLayout } from '@/config/app' 
const requireContextLayouts = require.context('@/layouts', true, /index.vue$/)
const layouts = requireContextLayouts.keys()
  .map(file =>
    [file.replace(/(^.\/)|(\.vue$)/g, '').replace('/index', ''), requireContextLayouts(file)]
  )
  .reduce((components, [name, component]) => {
    components[name] = component.default;
    return components;
  }, {})


export default {
  name: 'App', 
  data() {
    return {  
      layout: defaultLayout
    }
  }, 
  created() {
    const layout = this.$route.meta?.layout || defaultLayout;
    this.setLayout(layout);
  },
  methods: {
    setLayout(layout) {
      if(!layout || !layouts[layout]) {
        layout = defaultLayout;
      }
      this.layout = layouts[layout];
    }
  }
}
</script>

<style> 
</style>
