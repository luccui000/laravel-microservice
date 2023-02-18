import Vue from 'vue';
import Vuex from 'vuex';
import auth from './modules/auth';
import user from './modules/user';
import product from './modules/product';
import category from './modules/category';
import supplier from './modules/supplier';
import brand from './modules/brand';
import discount from './modules/discount';
import coupon from './modules/coupon';
import dashboard from './modules/dashboard';
import order from './modules/order';
import customer from './modules/customer';
import post from './modules/post';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {},
  getters: {},
  actions: {},
  mutations: {},
  modules: {
    auth,
    user,
    product,
    category,
    supplier,
    brand,
    discount,
    coupon,
    dashboard,
    order,
    customer,
    post,
  },
});
