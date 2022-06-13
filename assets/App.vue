<script setup>
import { RouterLink, RouterView } from "vue-router";
import SideBarTest from './components/sidebar/SideBarTest'
import { sidebarWidth } from './components/sidebar/state'

</script>



<template>
  
  <SideBarTest /> 
  <div :style="{'margin-left':sidebarWidth }">
    <router-view />
  </div>
  <!-- <RouterView /> -->
</template>

<style scoped lang="scss">

</style>
