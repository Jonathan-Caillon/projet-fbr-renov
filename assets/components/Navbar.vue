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


</script>

<template>

<!-- NAVBAR -->
  <header>
  
    <div class="wrapper">
        <nav>
          <div class="navbar">
            <div class="container nav-container">
                <input class="checkbox" type="checkbox" name="" id="" />
                <div class="hamburger-lines">
                  <span class="line line1"></span>
                  <span class="line line2"></span>
                  <span class="line line3"></span>
                </div>  
          
              <div class="menu-items">
          
                <h1>FBR Rénovation Immobilière</h1>
              
                <RouterLink to="/"> <IconHome/>  Home</RouterLink>
                <RouterLink to="/Clients"> <IconClient/>  Clients</RouterLink>
                <RouterLink to="/add"> <IconConstruction/> Chantiers</RouterLink>
                <RouterLink to="/Contacts"> <IconContact/>   Contacts</RouterLink>
                <RouterLink to="/Calendrier"><IconCalendar/>  Calendrier</RouterLink>
                <RouterLink to="/Dépannages"><IconRepair/>  Dépannages</RouterLink>
                <RouterLink to="/Locatiers"><IconTrade /> Locatiers</RouterLink>
                <RouterLink to="/Statistiques"><IconStat/>  Statistiques</RouterLink>
              </div>
            </div>
          </div>
        </nav>
    </div>
  </header>

  <RouterView />
</template>


<style>
/* ----- LOGO ----- */

header {
  width: 75%;
  z-index: 2;
}

h1 {
  font-weight: 500;
  top: -10px;
  color: #fff;
  font-size: 1.5rem;
  display: flex;
  align-items: center;
  padding-left: 20px; 
}

/* ----- NAVIGATEUR RESPONSIVE ----- */

@import "@/base.css";
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500;600;700&family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap');

body {
   max-height: 100vh;
   width: 100vw;
   overflow: hidden;
   font-family: 'Poppins', sans-serif;
}

.navbar .nav-container .router-link-exact-active{
  color: #fff;
  font-weight: bolder;
} 

@media (hover: hover) {
  a:hover {
    background-color: #0f1120;
  }
}

.nav-container {
  display: flex;
  justify-content: space-between;
  height: 62px;
  /* display: block;
  position: relative; */
  
}

.navbar .menu-items {
  display: flex;
  overflow: hidden;
  padding:0;
}

.navbar .nav-container li {
  list-style: none;
}

.navbar .nav-container a {
  text-decoration: none;
  color: #7e8299;
  font-weight: 300;
  font-size: 1.4em;
  padding: 0.7rem;
}


.navbar .nav-container a:hover{
    font-weight: bolder;
    color: #fff;
}


/* -- hamburger -- */
.nav-container .checkbox {
  position: absolute;
  display: block;
  height: 32px;
  width: 32px;
  top: 20px;
  left: 20px;
  z-index: 5;
  opacity: 0;
  cursor: pointer;
}

.nav-container .hamburger-lines {
  display: block;
  height: 26px;
  width: 32px;
  position: absolute;
  top: 17px;
  left: 20px;
  z-index: 2;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.nav-container .hamburger-lines .line {
  display: block;
  height: 4px;
  width: 100%;
  border-radius: 10px;
  background: #fff;
}

.nav-container .hamburger-lines .line1 {
  transform-origin: 0% 0%;
  transition: transform 0.4s ease-in-out;
}

.nav-container .hamburger-lines .line2 {
  transition: transform 0.2s ease-in-out;
}

.nav-container .hamburger-lines .line3 {
  transform-origin: 0% 100%;
  transition: transform 0.4s ease-in-out;
}


.navbar .menu-items {
  padding-top: 120px;
  background-color: #181c32;
  height: 100vh;
  width: 100%;
  transform: translate(-150%);
  display: flex;
  flex-direction: column;
  transition: transform 0.5s ease-in-out;
  text-align: left;
}

.nav-container input[type="checkbox"]:checked ~ .menu-items {
  transform: translateX(0);
}

.nav-container input[type="checkbox"]:checked ~ .hamburger-lines .line1 {
  transform: rotate(45deg);
}

.nav-container input[type="checkbox"]:checked ~ .hamburger-lines .line2 {
  transform: scaleY(0);
}

.nav-container input[type="checkbox"]:checked ~ .hamburger-lines .line3 {
  transform: rotate(-45deg);
}

.nav-container input[type="checkbox"]:checked ~ .logo{
  display: none;
}


/* ----- MEDIA QUERIES ----- */

 @media only screen and (min-width: 1026px) {
   header {
   width: 30%; 
  }
} 

@media only screen and (max-width: 1025px) {
   .navbar .nav-container a {
      font-size: 2rem;
  }
    h1 {
      font-size:2rem;
  }

} 

</style>
