import LoginView from '@/views/Auth/login.vue';
import RegisterView from '@/views/Auth/register.vue';
import WishlistView from '@/views/Auth/wishlist.vue';
import AccountView from '@/views/Account/index.vue';
import UserVerifyView from '@/views/Auth/verify.vue';

const auth = [
  {
    path: '/login',
    name: 'login.index',
    component: LoginView,
    meta: {
      // layout: 'auth',
      title: 'Đăng nhập',
      middleware: 'guest',
    },
  },
  {
    path: '/register',
    name: 'register.index',
    component: RegisterView,
    meta: {
      // layout: 'auth',
      title: 'Đăng ký tài khoản',
      middleware: 'guest',
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
    component: AccountView,
    meta: {
      // layout: 'auth',
      title: 'Danh sách yêu thích',
    },
  },
  {
    path: '/user/verify',
    name: 'user.verify.index',
    component: UserVerifyView,
    meta: {
      // layout: 'auth',
      title: 'Xác thực tài khoản',
    },
  },
];

export default auth;
