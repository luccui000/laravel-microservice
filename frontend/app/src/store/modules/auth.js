import { auth } from '@/apis/resources';
import { setToken } from '@/utils/auth';

const state = {
  isLogin: false,
  token: null,
  user: null,
};
const getters = {
  isLogin(state) {
    return state.isLogin;
  },
  user(state) {
    return state.user;
  },
};
const actions = {
  async login({ commit, dispatch }, { email, password }) {
    const response = await auth.login(email, password);
    commit('LOGIN_SUCCESS', response.data.data);
    dispatch('setToken', response.data.data.token);
    dispatch('getInfo');
  },
  async getInfo({ commit }) {
    try {
      const response = await auth.me();
      if (response.data.success) commit('SET_USER', response.data.data.user);
    } catch (error) {
      console.log(error);
    }
  },
  setToken({ commit }, token) {
    commit('SET_TOKEN', token);
  },
};
const mutations = {
  LOGIN_SUCCESS(state, data) {
    state.isLogin = true;
    state.token = data.token;
  },
  SET_TOKEN(state, token) {
    state.token = token;
    setToken(token);
  },
  SET_USER(state, user) {
    state.isLogin = true;
    state.user = user;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
