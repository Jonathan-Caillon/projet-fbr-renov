<script setup>
import { RouterLink, RouterView } from "vue-router";
import IconClient from "./icons/IconClient.vue";
import IconConstruction from "./icons/IconConstruction.vue";
import IconContact from "./icons/IconContact.vue";
import IconCalendar from "./icons/IconCalendar.vue";
import IconRepair from "./icons/IconRepair.vue";
import IconStat from "./icons/IconStat.vue";
import IconHome from "./icons/IconHome.vue";
import IconTrade from "./icons/IconTrade.vue";


window.addEventListener("resize", function() {
 if (window.innerWidth > 1090 ){
  document.querySelector(".sidebar").classList.remove("collapse");
 }else{
  document.querySelector(".sidebar").classList.add("collapse")
 }
});


</script>


<template>

<!-- NAVBAR -->

<div class="container">
 <div class="sidebar">

  <!--button --> 
 
  <!------>

  <span class="logo"></span>
  <a class="logo-expand" href="#">FBR Renovation Immobilière</a>
  <div class="side-wrapper">
   <div class="side-title">MENU</div>
   <div class="side-menu">

    <RouterLink to="/"  class="sidebar-link discover is-active">
     <IconHome />
      Home
    </RouterLink>

    <RouterLink to="/Clients" class="sidebar-link trending">
     <IconClient />
      Clients
    </RouterLink>

    <RouterLink to="/add" class="sidebar-link" >
     <IconConstruction/>
      Chantiers
    </RouterLink>

    <RouterLink to="/Contacts" class="sidebar-link">
     <IconContact/> 
      Contacts
    </RouterLink>

    <RouterLink to="/Calendrier" class="sidebar-link">
     <IconCalendar/>
      Calendrier
    </RouterLink>

    <RouterLink to="/Dépannages" class="sidebar-link">
     <IconRepair/>
      Dépannages
    </RouterLink>

    <RouterLink to="/Locatiers" class="sidebar-link">
     <IconTrade />
      Locatiers
    </RouterLink>

    <RouterLink to="/Statistiques" class="sidebar-link">
     <IconStat/>
      Statistiques
    </RouterLink>

   </div>
  </div> 
 </div>
</div>



</template>


<style scoped lang="scss">

/* ----- LOGO ----- */

/* ----- NAVIGATEUR RESPONSIVE ----- */

.container {
 display: flex;

  // position: fixed;
}

.sidebar {
 position: fixed;
 height:100vh;
 background-color: #1f1d2b;
 z-index: 555;
 width: 230px;
//  border-right:2px solid #f0eff7;
 height: 100vh;
 padding: 30px;
 display: flex;
 flex-direction: column;
 flex-shrink: 0;
 transition-duration: 0.2s;
//  overflow-y: auto;
 overflow-x: hidden;
 
 margin:0;


 .logo {
  display: none;
  width: 30px;
  height: 30px;
  background-color: #22b07d;
  flex-shrink: 0;
  color: #fff;
  align-items: center;
  border-radius: 50%;
  justify-content: center;

  &-expand {
   text-decoration: none;
   color: #fff;
   font-size: 19px;
   font-weight: 600;
   line-height: 34px;
  //  position: sticky;
   top: 0;
   &:before {
    content: "";
    position: absolute;
    top: -30px;
    left: 0;
    background: var(--theme-bg);
    width: 200px;
    height: 70px;
    z-index: -1;
   }
  }
 }
 &-link {
  &:hover,
  &.is-active {
   color: #fff;
   font-weight: 600;
   &:nth-child(2n + 1) {
    svg {
     background: #ff7551;
    }
   }
   &:nth-child(2n) {
    svg {
     background: #32a7e2;
    }
   }
   &:nth-child(2n + 3) {
    svg {
     background: #6c5ecf;
    }
   }
  }
 }
 &.collapse {
  width: 90px;
  // border-right: 1px solid var(--border-color);
  // border-right: 1 px solid #fff;
  .logo-expand,
  .side-title {
   display: none;
  }
  .logo {
   display: flex;
  }
  .side-wrapper {
   width: 30px;
  }
  .side-menu svg {
   margin-right: 30px;
  }
 }
}

@keyframes bottom {
 0% {
  transform: translateY(100px);
  opacity: 0;
 }

 100% {
  opacity: 1;
  transform: none;
 }
}

.side-menu {
 display: flex;
 flex-direction: column;
 a {
  display: flex;
  align-items: center;
  text-decoration: none;
  color: var(--body-color);
  & + a {
   margin-top: 26px;
  }
 }
 svg {
  width: 30px;
  padding: 8px;
  border-radius: 10px;
  background-color: var(--button-bg);
  flex-shrink: 0;
  margin-right: 16px;
  &:hover {
   color: #fff;
  }
 }
}

.side-title {
 font-size: 12px;
 letter-spacing: 0.07em;
 margin-bottom: 24px;
}

.side-wrapper {
 border-bottom: 1px solid var(--border-color);
 padding: 36px 0;
 width: 145px;
 & + & {
  border-bottom: none;
 }
}

/* ----- SCROLL BAR ----- */ 

/* width */
::-webkit-scrollbar {
  width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px #181c32; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  // background: #181c32; 
  background: #1f1d2b;
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background:#1f1d2b;
  // background: #181c32; 
}
 
/* ----- BUTTON TOGGLE ----- */
  





/* ----- MEDIA QUERIES ----- */

</style>
