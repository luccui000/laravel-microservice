<template>
  <tr class="cart__row border-bottom line1 cart-flex border-top" v-if="cart">  
    <td class="cart__image-wrapper cart-flex-item">
      <router-link :to="`/products/${cart.product_id}`">
        <img class="cart__image" 
          :src="cart.product.image_origin"
          alt="Minerva Dress black"
        >
      </router-link>
    </td>
    <td class="cart__meta small--text-left cart-flex-item">
      <div class="list-view-item__title">
        <router-link :to="`/products/${cart.product_id}`">{{ cart.name }}</router-link>
      </div>
    </td>
    <td class="cart__price-wrapper cart-flex-item">
      <span class="money">{{ cart.price | vietnamdong }}</span>
    </td>
    <td class="cart__update-wrapper cart-flex-item text-right">
      <div class="cart__qty text-center">
        <div class="qtyField">
          <div class="qtyBtn minus" @click="decreaseQuantity">
            <i class="icon icon-minus"></i>
          </div>
          <input 
            class="cart__qty-input qty" 
            type="text"  
            v-model="quantity"
            pattern="[0-9]*"
          >
          <div class="qtyBtn plus" @click="increaseQuantity">
            <i class="icon icon-plus"></i>
          </div>
        </div>
      </div>
    </td>
    <td class="text-right small--hide cart-price">
      <div>
        <span class="money">{{  cart.total | vietnamdong }}</span>
      </div>
    </td>
    <td class="text-center small--hide">
      <div @click="deleteProduct" class="btn btn--secondary cart__remove" title="Remove tem">
        <i class="icon icon anm anm-times-l"></i>
      </div>
    </td>
  </tr>
</template>

<script>
export default {
  name: 'CartItem',
  props: ['cart'],
  data() {
    return {
      quantity: 0
    }
  },
  mounted() {
    this.quantity = this.cart.quantity;
  },
  methods: {
    decreaseQuantity() {
      let quantity = this.cart.quantity;

      if(quantity > 1)
        quantity = quantity - 1;

      this.$store.dispatch('cart/updateQuantity', {
        id: this.cart.id,
        quantity
      }).then((response) => { 
        this.quantity = response.quantity;
      })
    },
    increaseQuantity() {
      let quantity = this.cart.quantity;
 
      quantity = quantity + 1;
      
      this.$store.dispatch('cart/updateQuantity', {
        id: this.cart.id,
        quantity
      }).then((response) => {
        this.quantity = response.quantity;
      })
    },
    deleteProduct() {
      this.$store.dispatch('cart/deleteProduct', this.cart.product_id)
    }
  },
  watch: {
    quantity: {
      handler(value) {
        if(value < 1) {
          this.quantity = 1;
        }

        this.$store.dispatch('cart/updateQuantity', {
          id: this.cart.id,
          quantity: this.quantity
        }).then((response) => {
          this.quantity = response.quantity;
        })
      }
    }
  }
}
</script>

<style scoped>
.qtyBtn {
  cursor: pointer;
}
</style>