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
		padding: 2rem;

		@media (max-width: 1024px) {
			padding-left: 6rem;
		}
	}
}
</style>
