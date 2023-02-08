import Vue from 'vue';
import App from './App.vue';
import store from '@/store';
import router from '@/router';
import Alert from '@/libs/components/Alert';
import '@/utils/style';
import '@/utils/globalComponent';
import '@/filters';
import '@/utils/rules';
import { ValidationProvider, ValidationObserver } from 'vee-validate';
import { localize } from 'vee-validate';
import Notifications from 'vue-notification';

localize('vi');

Vue.use(Alert);
Vue.component('validation-provider', ValidationProvider);
Vue.component('validation-observer', ValidationObserver);
Vue.use(Notifications);

Vue.config.productionTip = false;
Vue.config.errorHandler = (error) => {
  console.log(error);
};

const Application = () => {
  return {
    init: async () => {
      // console.log(router.);
      // console.log(window.location.href);
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
