<template>
  <div class="home2-default pageWrapper">
    <!-- Notification Bar -->
    <notification-bar></notification-bar>
    <!-- Top Header -->
    <top-header></top-header>
    <!-- Navigation header -->
    <nav-header></nav-header>
    <!-- Main Content -->
    <slot />
  </div> 
</template>

<script>
import NotificationBar from '@/components/NotificationBar';
import TopHeader from '@/components/TopHeader';
import NavHeader from '@/components/Header';

export default {
  name: 'DefaultLayout',
  components: {
    NotificationBar,
    TopHeader,
    NavHeader,
  }
}
</script>