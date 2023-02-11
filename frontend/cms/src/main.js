import Vue from 'vue';
import App from './App.vue';
import store from './store';
import router from './router';
import '@/filters/index';
import ElementUI from 'element-ui';
import Multiselect from 'vue-multiselect';
import Editor from '@tinymce/tinymce-vue';

import 'element-ui/lib/theme-chalk/index.css';
import 'vue-multiselect/dist/vue-multiselect.min.css';

Vue.config.productionTip = false;

Vue.use(ElementUI);
Vue.use(Multiselect);

Vue.component('l-multiselect', Multiselect);
Vue.component('l-editor', Editor);

const Application = () => {
  return {
    init: async () => {
      try {
        await store.dispatch('user/getInfo');
      } catch (error) {
        console.log(error);
      }

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
