<script setup>
import { RouterLink, RouterView } from "vue-router";
// import Navbar from "./components/Navbar.vue";
import Navigateur from "./components/Navigateur.vue";
import Search from "./components/Search.vue";
import Sidebar from "./components/Sidebar.vue"
</script>

<template>

	<div id="app">
		<!-- Sidebar -->
    <!-- <Navigateur /> -->
    <!-- <Search /> -->
		<Sidebar />
    <!-- <Search /> -->
    
		<!-- Content -->
		<RouterView />
	</div>

</template>
  
 <!-- <Navigateur /> 
  <Search />
  <RouterView /> -->


<style lang="scss">


button {
	cursor: pointer;
	appearance: none;
	border: none;
	outline: none;
	background: none;
}

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
