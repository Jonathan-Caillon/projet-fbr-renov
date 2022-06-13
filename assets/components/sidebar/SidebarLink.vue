<script>
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import { collapsed } from './state'
export default {
  props: {
    to: { type: String, required: true },
    icon: { type: String, required: true }
  },
  setup(props) {
    const route = useRoute()
    const isActive = computed(() => route.path === props.to)
    return { isActive, collapsed }
  }
}
</script>

<template>
  <router-link :to="to" class="link" :class="{ active: isActive }">
    <i class="icon" :class="icon" />
    <transition name="fade">
      <span v-if="!collapsed">
        <slot />
      </span>
    </transition>
  </router-link>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.1s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
.link {
  padding-left: 25px;
  padding-right: 25px;
  align-items: center;
  cursor: pointer;
  position: relative;
  font-weight: 400;
  user-select: none;
  margin: 0.5em 0; 
  padding: 0.4em;
  border-radius: 0.25em;
  color: white;
  text-decoration: none;
  display:flex;
  height:50px;

}
.link:hover {
  background-color: #181c32;
 
}
.link.active {
  background-color: #3146bb;
  
}
.link .icon {
  flex-shrink: 0;
  min-width: 46px;
  height: 30px; 
  /* margin-right: 10px; */
  margin-top:0.5rem;
  margin-bottom:0.5rem;
}
</style>
