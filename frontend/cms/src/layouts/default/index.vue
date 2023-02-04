<template>
  <div class="main-wrapper">
    <header-default-view />
    <sidebar-default-view />
    <div class="page-wrapper" style="min-height: 359px;">
      <div class="content">
        <slot />
      </div>
      <notification />
    </div>
  </div>  
</template>

<script> 

import Notification from '@/components/notification/index.vue';
import HeaderDefaultView from './components/header.vue';
import SidebarDefaultView from './components/sidebar.vue';

export default {
  name: 'DefaultLayout',
  components: { 
    Notification,
    HeaderDefaultView,
    SidebarDefaultView
  }
}
</script>