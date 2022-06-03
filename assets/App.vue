<script setup>
import { RouterLink, RouterView } from "vue-router";
// import Search from "./components/Search.vue";
import Sidebar from "./components/Sidebar.vue";
</script>

<template>
  <!-- <Search /> -->
  <Sidebar />
  <!-- Content -->
  <RouterView />
</template>

<style scoped lang="scss">
#app {
  display: flex;

  main {
    flex: 1 1 0;
    padding: 0 0 0 calc(2rem + 32px);
  }
}
</style>
