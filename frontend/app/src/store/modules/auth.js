import { auth } from '@/apis/resources';
import { setToken } from '@/utils/auth';
import router from '@/router';

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
  register(_, account) {
    return new Promise((resolve, reject) => {
      auth
        .register(account)
        .then((response) => {
          const { data } = response;
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },

  verify(_, code) {
    return new Promise((resolve, reject) => {
      auth.verify(code)
        .then(response => {
          const { data } = response;
          resolve(data.data)
        }).catch(error => reject(error))
    })
  },
  getUser({ state }) {
    return new Promise((resolve) => {
      resolve(state);
    });
  },
  async getInfo({ commit }) {
    try {
      const { data } = await auth.me();
      if (data.success) commit('SET_USER', data.data);
    } catch (error) {
      console.log(error);
    }
  },
  logout({ commit }) {
    return new Promise((resolve, reject) => {
      auth
        .logout()
        .then((response) => {
          commit('SET_TOKEN', null);
          commit('SET_USER', null);
          resolve(response.data);
          router.push('/')
        })
        .catch((error) => reject(error));
    });
  },
  updateProfile({ commit }, user) {
    return new Promise((resolve, reject) => {
      auth.updateProfile(user).then((response) => {
        const { data } = response;

        if (data.success) {
          commit('SET_USER', data.data);
          resolve();
        } else {
          reject(new Error('Error'));
        }
      });
    });
  },
  updateAddress(_, address) {
    return new Promise((resolve, reject) => {
      auth
        .updateAddress(address)
        .then((response) => resolve(response))
        .catch((error) => reject(error));
    });
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
