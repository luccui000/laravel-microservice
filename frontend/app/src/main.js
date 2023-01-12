import Vue from 'vue';
import App from './App.vue';
import store from '@/store';
import router from '@/router';
import '@/utils/style';
import '@/utils/globalComponent';
import '@/filters';

Vue.config.productionTip = false;

const Application = () => {
  return {
    init: async () => {
      await store.dispatch('auth/getInfo');

      new Vue({
        router,
        store,
        render: (h) => h(App),
      }).$mount('#app');
    },
  };
};

const app = Application();
app.init();
