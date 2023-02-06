import cart from '@/apis/resources/cart';

const state = {
  carts: null,
};
const getters = {
  carts(state) {
    return state.carts;
  },
  detailCart() {
    return state.carts?.details;
  },
  getCoupon(state) {
    return state.carts?.coupon;
  },
};
const actions = {
  addToCart({ commit }, { product, quantity }) {
    console.log(product, quantity);
    commit('ADD_TO_CART');
  },
  getCarts({ commit }) {
    return new Promise((resolve, reject) => {
      cart
        .getCarts()
        .then((response) => {
          const { data } = response;
          commit('SET_CARTS', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  updateQuantity({ dispatch }, { id, quantity }) {
    return new Promise((resolve, reject) => {
      cart
        .updateQuantity(id, { quantity })
        .then((response) => {
          const { data } = response;
          dispatch('getCarts');
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  deleteProduct({ dispatch }, productId) {
    return new Promise((resolve, reject) => {
      cart
        .deleteProduct(productId)
        .then((response) => {
          const { data } = response;
          dispatch('getCarts');
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  applyCoupon({ dispatch }, couponName) {
    return new Promise((resolve, reject) => {
      cart.applyCoupon(couponName)
        .then(response => {
          const { data } = response;
          dispatch('getCarts');
          resolve(data.data)
        }).catch(error => reject(error))
    })
  }
};
const mutations = {
  ADD_TO_CART(state) {
    console.log(state);
  },
  SET_CARTS(state, carts) {
    state.carts = carts;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
