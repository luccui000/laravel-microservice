import Vue from 'vue';
import Vuex from 'vuex';
import product from '@/store/modules/product';
import auth from '@/store/modules/auth';
import cart from '@/store/modules/cart';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    showNotification: localStorage.getItem('show_notification') || true,
  },
  getters: {},
  actions: {
    showNotification({ commit }) {
      commit('SHOW_NOTIFICATION');
    },
  },
  mutations: {
    SHOW_NOTIFICATION: (state) => {
      localStorage.setItem('show_notification', false);
      state.showNotification = false;
    },
  },
  modules: {
    product,
    auth,
    cart,
  },
});
