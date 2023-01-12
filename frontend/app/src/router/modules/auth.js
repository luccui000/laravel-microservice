import LoginView from '@/views/Auth/login.vue';
import RegisterView from '@/views/Auth/register.vue';
import WishlistView from '@/views/Auth/wishlist.vue';

const auth = [
  {
    path: '/login',
    name: 'login.index',
    component: LoginView,
    meta: {
      // layout: 'auth',
      title: 'Đăng nhập',
    },
  },
  {
    path: '/register',
    name: 'register.index',
    component: RegisterView,
    meta: {
      // layout: 'auth',
      title: 'Đăng ký tài khoản',
    },
  },
  {
    path: '/wishlist',
    name: 'wishlist.index',
    component: WishlistView,
    meta: {
      // layout: 'auth',
      title: 'Danh sách yêu thích',
    },
  },
  {
    path: '/me',
    name: 'me.index',
    component: WishlistView,
    meta: {
      // layout: 'auth',
      title: 'Danh sách yêu thích',
    },
  },
];

export default auth;
