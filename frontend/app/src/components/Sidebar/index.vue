<template>
  <div class="sidebar_widget categories">
    <div class="widget-title">
      <h2>{{ title }}</h2>
    </div>
    <div class="widget-content">
      <ul class="infos">
        <li 
          class="info-item"
          v-for="index, tab in tabs"
          :key="index"
        >
          <a 
            class="info-link" 
            @click="setTab(tab.name)" 
            :class="{ 'active': tab === tab.name }"
          >{{ tab.name }}</a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>

export default {
  name: "SidebarComponent",
  props: ['title', 'tabs'],
  data() {
    return {
      tab: this.tabs[0].name
    }
  },
  methods: {
    setTab(tab) {
      this.tab = tab;
    }
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

</style>