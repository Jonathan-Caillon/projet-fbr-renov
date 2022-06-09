<script>
import SidebarLink from "./SidebarLink";
import { collapsed, toggleSidebar, sidebarWidth } from "./state";
export default {
  props: {},
  components: { SidebarLink },
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth };
  },
};
</script>

<template>
  <div class="sidebar" :style="{ width: sidebarWidth }">
    
      <span v-if="collapsed">
        <span
          class="collapse-icon"
          :class="{ 'rotate-180': collapsed }"
          @click="toggleSidebar"
        >
          <i class="fas fa-angle-double-left" />
        </span>
      </span>

      <span v-else>
        <!-- <div>FBR</div>
          <div>Renovation </div>
          <div>Immobilière</div> -->
        <span
          class="collapse-icon"
          :class="{ 'rotate-180': collapsed }"
          @click="toggleSidebar"
        ><h1> Fbr Renovation Immobiliere</h1>
          <i class="fas fa-angle-double-left"/>
        </span>
      </span>
    
    <div class="menu">
      <SidebarLink to="/" icon="fas fa-home">Home</SidebarLink>
      <SidebarLink to="/list-clients" icon="fa-solid fa-address-card">Clients</SidebarLink>
      <SidebarLink to="/add-chantier" icon="fa-solid fa-person-digging">Chantiers</SidebarLink>
      <SidebarLink to="/add-depannage" icon="fa-solid fa-screwdriver-wrench">Dépannage</SidebarLink>
      <SidebarLink to="/add-locatier" icon="fa-solid fa-truck-ramp-box">Locatiers</SidebarLink>
      <SidebarLink to="/Calendrier" icon="fa-solid fa-calendar-days">Calendrier</SidebarLink>
      <SidebarLink to="/Contacts" icon="fa-solid fa-address-book">Contacts</SidebarLink>
      <SidebarLink to="/Statistiques" icon="fa-solid fa-chart-line">Statistiques</SidebarLink>
    </div>
  </div>
</template>


<style scoped>
h1 {
  font-family: 'Poppins', sans-serif;
  font-size: 20px;
  font-weight: 500;
}

.menu {
  padding-top: 80px;
  margin-top: 0.2rem;
}

.sidebar {
  overflow: scroll; 
  color: white;
  background-color: #492f85;
  float: left;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  bottom: 0;
  padding: 0.5em;
  transition: 0.3s ease;
  display: flex;
  flex-direction: column;
}

.collapse-icon {
  z-index: 999;
  position: absolute;
  top: 0px;
  padding: .9em 0.5em 0.75em 0.5em;
  font-size:30px;
  color: #fff;
  display:flex;
  align-items:flex-start;
  transition: 0.2s linear;
}

.rotate-180 {
  transform: rotate(180deg); 
  transition: 0.5s linear;
  font-size:30px;
}

</style>
