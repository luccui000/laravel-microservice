import product from '@/apis/resources/product';

export default {
  namespaced: true,
  state: {
    products: null,
    product: null,
    colors: [],
    sizes: [],
    tags: [],
    brands: [],
    data: null,
    filter: {
      category_id: null,
      price: {
        from: 0,
        to: 0,
        value: 0,
      },
      size_id: null,
      color_id: null,
      brands: [],
      tags: [],
      per_page: 16,
    },
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
    async getAllProduct({ state, commit }, page = 1) {
      return new Promise((resolve, reject) => {
        product
          .getAll(state.filter, page)
          .then((response) => {
            const { data } = response;
            commit('SET_PRODUCTS', data.data.data);
            commit('SET_DATA', data.data);
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
    getAttributes({ commit }) {
      return new Promise((resolve, reject) => {
        product
          .getAttributes()
          .then((response) => {
            const { data } = response;
            if (data.success) {
              commit('SET_COLORS', data.data.colors);
              commit('SET_SIZES', data.data.sizes);
              commit('SET_TAGS', data.data.tags);
              commit('SET_BRANDS', data.data.brands);
              resolve(data.data);
            }
          })
          .catch((error) => reject(error));
      });
    },
  },
  mutations: {
    SET_PRODUCTS(state, products) {
      state.products = products;
    },
    SET_PRODUCT(state, product) {
      state.product = product;
    },
    SET_COLORS(state, colors) {
      state.colors = colors;
    },
    SET_SIZES(state, sizes) {
      state.sizes = sizes;
    },
    SET_TAGS(state, tags) {
      state.tags = tags;
    },
    SET_BRANDS(state, brands) {
      state.brands = brands;
    },
    SET_COLOR(state, color) {
      state.filter.color_id = color;
    },
    SET_SIZE(state, size) {
      state.filter.size_id = size;
    },
    SET_TAG(state, tag) {
      state.filter.tags.push(tag);
    },
    SET_BRAND(state, brands) {
      state.filter.brands = [...new Set(brands)];
    },
    SET_CATEGORY(state, cate) {
      state.filter.category_id = cate;
    },
    SET_PRICE(state, price) {
      state.filter.price = price;
    },
    SET_DATA(state, data) {
      state.data = data;
    },
    SET_PER_PAGE(state, data) {
      state.filter.per_page = data;
    },
    RESET_FILTER(state) {
      state.filter = {
        category_id: null,
        price: {
          from: 0,
          to: 0,
          value: 0,
        },
        size_id: null,
        color_id: null,
        brands: [],
        tags: [],
      };
    },
  },
};
