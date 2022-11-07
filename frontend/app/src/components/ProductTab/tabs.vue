<template>
  <div class="tabs-listing">
    <ul class="product-tabs">
      <li
          v-for="(tab, index) in tabs"
          :class="{ 'active': tab.isActive }"
          :rel="`tab${index + 1}`"
          :key="tab.name"
      >
        <a class="tablink" :href="tab.href" @click="selectTab(tab)">{{ tab.name }}</a>
      </li>
    </ul>
    <div class="tab-container">
      <slot></slot>
    </div>
  </div>
</template>

<script>

export default {
  name: 'ProductTabs',
  components: {
  },
  data() {
    return {
      tabs: []
    };
  },
  created() {
    this.tabs = this.$children;
  },
  methods: {
    selectTab(selectedTab) {
      this.tabs.forEach(tab => {
        tab.isActive = (tab.name === selectedTab.name);
      });
    }
  }
}
</script>

<style scoped>

</style>