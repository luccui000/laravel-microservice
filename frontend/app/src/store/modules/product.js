import product from '@/apis/resources/product';

export default {
  namespaced: true,
  state: {
    products: null,
    product: null,
  },
  getters: {
    all(state) {
      return state.products;
    },
    getProduct(state) {
      return state.product;
    },
  },
  actions: {
    async getAllProduct({ commit }) {
      return new Promise((resolve, reject) => {
        product
          .all()
          .then((response) => {
            const { data } = response;
            console.log(data);
            commit('SET_PRODUCTS', data.data.data);
            resolve(data.data.data);
          })
          .catch((error) => reject(error));
      });
    },
    async getProductById({ commit }, id) {
      try {
        const response = await product.get(id);

        if (response.data.success) {
          commit('SET_PRODUCT', response.data.data);
        }
      } catch (error) {
        console.log(error);
      }
    },
    async viewProduct(_, product) {
      console.log(product);
    },
  },
  mutations: {
    SET_PRODUCTS(state, products) {
      state.products = products;
    },
    SET_PRODUCT(state, product) {
      state.product = product;
    },
  },
};
