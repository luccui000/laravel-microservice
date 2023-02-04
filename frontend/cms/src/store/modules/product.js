import product from '@/apis/resources/v1/product';

const state = {
  data: null,
  totalPage: 0,
  sizes: [],
  colors: [],
  tags: [],
  products: [],
  product: null,
};
const getters = {
  getAllProduct(state) {
    return state.data?.data;
  },
  getTotalPage(state) {
    return state.totalPage;
  },
};
const actions = {
  getAll({ commit }) {
    return new Promise((resolve, reject) => {
      product
        .getAll()
        .then((response) => {
          const { data } = response;
          commit('SET_PRODUCTS', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  getAllProduct({ commit }, page) {
    return new Promise((resolve, reject) => {
      product
        .getProducts(page)
        .then((response) => {
          const { data } = response;
          commit('SET_DATA', data.data);
          const { total, per_page } = data.data;
          commit('SET_TOTAL_PAGE', Math.floor(total / per_page));
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  getProductById({ commit }, id) {
    return new Promise((resolve, reject) => {
      product
        .get(id)
        .then((response) => {
          const { data } = response;
          commit('SET_PRODUCT', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  create({ commit }, params) {
    return new Promise((resolve, reject) => {
      product
        .create(params)
        .then((response) => {
          const { data } = response;
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  getAttribute({ commit }) {
    return new Promise((resolve, reject) => {
      product
        .getAttributes()
        .then((response) => {
          const { data } = response;
          if (data.success) {
            commit('SET_COLOR', data.data.colors);
            commit('SET_SIZE', data.data.sizes);
            commit('SET_TAG', data.data.tags);
            resolve(data.data);
          }
        })
        .catch((error) => reject(error));
    });
  },
  delete(_, id) {
    return new Promise((resolve, reject) => {
      product
        .destroy(id)
        .then((response) => {
          resolve(response.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_DATA(state, data) {
    state.data = data;
  },
  SET_TOTAL_PAGE(state, totalPage) {
    state.totalPage = totalPage;
  },
  SET_COLOR(state, colors) {
    state.colors = colors;
  },
  SET_SIZE(state, sizes) {
    state.sizes = sizes;
  },
  SET_TAG(state, tags) {
    state.tags = tags;
  },
  SET_PRODUCTS(state, products) {
    state.products = products;
  },
  SET_PRODUCT(state, product) {
    state.product = product;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
