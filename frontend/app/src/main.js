import Vue from 'vue';
import App from './App.vue';
import store from '@/store';
import router from '@/router';
import '@/utils/style';
import '@/utils/globalComponent';
Vue.use(store);

Vue.config.productionTip = false;

new Vue({
  render: (h) => h(App),
  router,
}).$mount('#app');
