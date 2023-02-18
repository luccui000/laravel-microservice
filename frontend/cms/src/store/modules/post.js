import post from '@/apis/resources/v1/post';

const state = {
  posts: [],
  filter: {
    per_page: 20,
  },
};
const getters = {};
const actions = {
  getAll({ state, commit }) {
    return new Promise((resolve, reject) => {
      post
        .all({ per_page: state.per_page })
        .then((response) => {
          const { data } = response;
          commit('SET_POSTS', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_POSTS(state, posts) {
    state.posts = posts;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
