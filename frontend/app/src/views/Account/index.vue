<template>
  <div>
    <div class="page section-header text-center">
			<banner
        :image="banner.image"
        :title="banner.title"
      />
		</div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar">
          <div class="sidebar_tags">
            <div class="sidebar_widget categories">
              <div class="widget-title">
                <h2>Quản lý tài khoản</h2>
              </div>
              <div class="widget-content">
                <ul class="infos">
                  <li class="info-item">
                    <a 
                      class="info-link" 
                      @click="setTab('account')" 
                      :class="{ 'active': tab === 'account' }"
                    >Tài khoản</a>
                  </li>
                  <li class="info-item">
                    <a 
                      class="info-link" 
                      @click="setTab('order')"
                      :class="{ 'active': tab === 'order' }" 
                    >Quản lý đơn hàng</a>
                  </li>
                  <li class="info-item">
                    <a 
                      class="info-link" 
                      @click="setTab('address')"
                      :class="{ 'active': tab === 'address' }"
                    >Địa chỉ</a>
                  </li>
                  <li class="info-item">
                    <a 
                      class="info-link"
                      @click="logout"
                    >
                      Đăng xuất
                    </a>
                  </li>
                </ul>
              </div>
            </div> 
            <div class="sidebar_widget categories">
              <div class="widget-title">
                <h2>Bình luận gần đây</h2>
              </div> 
              <div class="widget-content">
                <ul class="infos">
                  <li class="info-item">
                    <a
                      class="info-link"
                      @click="setTab('comment_product')"
                      :class="{ 'active': tab === 'comment_product' }"
                    >
                      Sản phẩm
                    </a>
                  </li> 
                  <li class="info-item">
                    <a
                      class="info-link"
                      @click="setTab('comment_post')"
                      :class="{ 'active': tab === 'comment_post' }"
                    >
                      Bài viết
                    </a>
                  </li> 
                </ul>
              </div>
            </div>
            <div class="sidebar_widget tags-clouds">
              <div class="widget-title">
                <h2>Tags</h2>
              </div>
              <div class="widget-content">
                <ul>
                  <li>
                    <a href="#">Fashion</a>
                  </li>
                  <li>
                    <a href="#">Clothes</a>
                  </li>
                  <li>
                    <a href="#">Shoes</a>
                  </li>
                  <li>
                    <a href="#">Jeans</a>
                  </li>
                  <li>
                    <a href="#">Furniture</a>
                  </li>
                  <li>
                    <a href="#">Sun Glasses</a>
                  </li>
                  <li>
                    <a href="#">Winter</a>
                  </li>
                  <li>
                    <a href="#">Autoparts</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="sidebar_widget">
              <div class="widget-title">
                <h2>Trending Now</h2>
              </div> 
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
          <div v-if="tab === 'account'"> 
            <account />
          </div>
          <div v-else-if="tab === 'order'">
            <order />
          </div>
          <div v-else-if="tab === 'address'">
            <Address />
          </div>
          <div v-else-if="tab === 'comment_post'">
            <comment-post />
          </div>
          <div v-else-if="tab === 'comment_product'">
            <comment-product />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script> 
import Banner from '@/components/Banner/index.vue';
import Account from './components/account.vue';
import Order from './components/order.vue';
import Address from './components/address.vue';
import CommentPost from './components/comment-post.vue';
import CommentProduct from './components/comment-product.vue';

export default {
  name: 'AccountView',
  components: {
    Banner,
    Account,
    Order,
    Address,
    CommentPost,
    CommentProduct,
  },
  data() { 
    return {
      banner: {
        image: {
          dataSrc: '',
          src: 'assets/images/account/account.jpg'
        },
        title: 'Thông tin tài khoản'
      },
      tab: 'account'
    };
  },
  mounted() {
    
  },
  methods: { 
    setTab(tab) {
      this.tab = tab;
    },
    logout() {
      this.$store.dispatch('auth/logout')
        .then(() => { 
          window.location.href = "/";
        })
    }
  },
  computed  : { 
  }
}

</script>

<style> 
.info-link {
  font-size: 1rem;
  cursor: pointer;
  padding: 10px 20px;
  border-left: 3px solid none;
  transition: .2s linear;
}

.info-link.active { 
  border-left: 3px solid #000;
  background-color: rgba(0, 0, 0, 0.05);
}

input:read-only {
  background-color: rgba(0, 0, 0, 0.05);
}
</style>