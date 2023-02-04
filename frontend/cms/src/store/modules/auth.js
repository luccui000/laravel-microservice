import auth from '@/apis/resources/v1/auth';
import { setToken } from '@/utils/auth';

const state = {
  token: null,
};
const getters = {};
const actions = {
  login({ commit }, { email, password }) {
    return new Promise((resolve, reject) => {
      auth
        .login({ email, password })
        .then((response) => {
          const { data } = response;
          commit('SET_TOKEN', data.data.token);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_TOKEN(state, token) {
    setToken(token);
    state.token = token;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
