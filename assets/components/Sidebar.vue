<script setup>
import { ref } from 'vue';
import { RouterLink, RouterView } from "vue-router";

// -----  TOGGLE SIDEBAR ----- //
const is_expanded = ref(localStorage.getItem("is_expanded") === "true")

const ToggleMenu = () => {
	is_expanded.value = !is_expanded.value
	localStorage.setItem("is_expanded", is_expanded.value)
}

// ---------------------------- //
// ----- DARK MODE ----- //

// --------------------- //
</script>


<template>
	<aside :class="`${is_expanded ? 'is-expanded' : ''}`">

		  <div class="menu-toggle-wrap">
			  <button class="menu-toggle" @click="ToggleMenu">
				  <span><svg xmlns="http://www.w3.org/2000/svg" fill="#fff" width="30" height="30" viewBox="0 0 24 24"><path d="M0 3.795l2.995-2.98 11.132 11.185-11.132 11.186-2.995-2.981 8.167-8.205-8.167-8.205zm18.04 8.205l-8.167 8.205 2.995 2.98 11.132-11.185-11.132-11.186-2.995 2.98 8.167 8.206z"/></svg></span>
			  </button>
		  </div>
        
  <div class="menu">
		<h3>Menu</h3>
		 <div class="menu" >

			     <RouterLink to="/"  class="sidebar-link discover is-active">
              <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32"
               viewBox="0 0 24 24" 
               fill="currentColor">
               <path d="M20 7.093v-5.093h-3v2.093l3 3zm4 5.907l-12-12-12 12h3v10h7v-5h4v5h7v-10h3zm-5 8h-3v-5h-8v5h-3v-10.26l7-6.912 7 6.99v10.182z"/>
              </svg>
              <p>Home</p>
            </RouterLink>

            <RouterLink to="/list-clients" class="sidebar-link trending">
              <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 24 24" fill="currentColor">
              <path d="M9.602 3.7c-1.154 1.937-.635 5.227 1.424 9.025.93 1.712.697 3.02.338 3.815-.982 2.178-3.675 2.799-6.525 3.456-1.964.454-1.839.87-1.839 4.004h-1.995l-.005-1.241c0-2.52.199-3.975 3.178-4.663 3.365-.777 6.688-1.473 5.09-4.418-4.733-8.729-1.35-13.678 3.732-13.678 3.321 0 5.97 2.117 5.97 6.167 0 3.555-1.949 6.833-2.383 7.833h-2.115c.392-1.536 2.499-4.366 2.499-7.842 0-5.153-5.867-4.985-7.369-2.458zm13.398 15.3h-3v-3h-2v3h-3v2h3v3h2v-3h3v-2z"/>
              </svg>
              <p>Clients</p>
            </RouterLink>

            <RouterLink to="/add-chantier" class="sidebar-link trending" >
              <svg class="fit"  xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor">
              <path d="M21.167 21h1.833v2h-22v-2h1.833l7.334-20h3.666l7.334 20zm-3.231-3h-11.872l-1.1 3h14.072l-1.1-3zm-9.306-7l-1.1 3h8.94l-1.1-3h-6.74zm2.934-8l-1.467 4h3.806l-1.467-4h-.872z"/>
              </svg>
              <p>Chantiers</p>
            </RouterLink>

            <RouterLink to="/Contacts" class="sidebar-link trending">
              <svg  viewBox="0 0 24 24" height="32" width="32" fill="currentColor" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
              <path d="M8.26 1.289l-1.564.772c-5.793 3.02 2.798 20.944 9.31 20.944.46 0 .904-.094 1.317-.284l1.542-.755-2.898-5.594-1.54.754c-.181.087-.384.134-.597.134-2.561 0-6.841-8.204-4.241-9.596l1.546-.763-2.875-5.612zm7.746 22.711c-5.68 0-12.221-11.114-12.221-17.832 0-2.419.833-4.146 2.457-4.992l2.382-1.176 3.857 7.347-2.437 1.201c-1.439.772 2.409 8.424 3.956 7.68l2.399-1.179 3.816 7.36s-2.36 1.162-2.476 1.215c-.547.251-1.129.376-1.733.376"/>
              </svg> 
              <p>Contacts</p>
            </RouterLink>

            <RouterLink to="/Calendrier" class="sidebar-link trending">
             <svg
              height="32" width="32"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor">
              <path
               d="M17 1c0-.552-.447-1-1-1s-1 .448-1 1v2c0 .552.447 1 1 1s1-.448 1-1v-2zm-12 2c0 .552-.447 1-1 1s-1-.448-1-1v-2c0-.552.447-1 1-1s1 .448 1 1v2zm13 5v10h-16v-10h16zm2-6h-2v1c0 1.103-.897 2-2 2s-2-.897-2-2v-1h-8v1c0 1.103-.897 2-2 2s-2-.897-2-2v-1h-2v18h20v-18zm-11.646 14c-1.318 0-2.192-.761-2.168-2.205h1.245c.022.64.28 1.107.907 1.107.415 0 .832-.247.832-.799 0-.7-.485-.751-1.3-.751v-.977c.573.05 1.196-.032 1.196-.608 0-.455-.369-.663-.711-.663-.575 0-.793.422-.782 1.003h-1.256c.052-1.401.902-2.107 2.029-2.107.968 0 1.969.613 1.969 1.64 0 .532-.234.945-.638 1.147.528.203.847.681.847 1.293-.001 1.201-.993 1.92-2.17 1.92zm5.46 0h-1.306v-3.748h-1.413v-1.027c.897.024 1.525-.233 1.657-1.113h1.062v5.888zm10.186-11v19h-22v-2h20v-17h2z"
              />
              </svg>
              <p>Calendrier</p>
            </RouterLink>

            <RouterLink to="/add-depannage" class="sidebar-link trending">
              <svg  class="fit" xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 24 24" fill="currentColor">
              <path d="M13.895 10.623l1.37-2.054c.35-.525 1.06-.667 1.585-.317.524.35.667 1.06.316 1.585l-1.369 2.054c-.35.525-1.06.667-1.585.317s-.667-1.06-.317-1.585zm-1.881-.684c.525.351 1.236.208 1.587-.317l1.383-2.074c.352-.526.209-1.237-.317-1.588-.525-.351-1.236-.208-1.587.318l-1.383 2.074c-.352.526-.21 1.237.317 1.587zm7.007 3.949l-1.212 1.817c-.322.483-.191 1.136.292 1.458s1.136.191 1.458-.292l1.211-1.817c.323-.483.192-1.136-.291-1.458-.483-.322-1.136-.192-1.458.292zm-3.071-.84c-.35.523-.208 1.231.315 1.58.524.349 1.231.208 1.58-.316l1.312-1.968c.35-.524.208-1.231-.316-1.58-.523-.349-1.23-.208-1.579.316l-1.312 1.968zm5.665 10.952c-.609 0-1.22-.232-1.686-.698l-7.022-7.144c1.088-1.203.56-3.279-1.182-3.588l-3.074-.546-1.058-1.058c-.601-.6-1.427-.916-2.273-.871-1.382.074-2.787-.417-3.842-1.472-.986-.987-1.478-2.279-1.478-3.572 0-.56.092-1.12.277-1.655l3.214 3.214c1.253.074 3.192-1.865 3.118-3.119l-3.213-3.214c.535-.185 1.094-.277 1.654-.277 1.293 0 2.586.493 3.572 1.479 1.055 1.055 1.545 2.46 1.472 3.842-.045.846.271 1.674.871 2.273l.027.027c-1.243 2.083.433 3.51 1.806 3.457-.247 1.181 1.017 2.411 2.102 2.411-.269 1.04.536 2.125 1.789 2.371-.505 1.822 2.258 3.767 3.857 1.315l2.756 2.755c.466.466.698 1.076.698 1.686 0 1.316-1.066 2.384-2.385 2.384zm.885-2.5c0-.552-.448-1-1.001-1-.552 0-1 .448-1 1s.448 1 1 1c.553 0 1.001-.448 1.001-1zm-9.631-3.939c-.667-.688-1.701-.739-3.584-.864-.286-.019-.462.165-.485.443l-.458 4.208s2.794 1.888 3.94 2.652c1.064-1.921 2.699-2.037 3.921-3.002l-3.334-3.437zm-1.622-1.692c1.457 0 1.678-2.064.303-2.308-5.171-.919-4.899-.889-5.069-.889-.635 0-1.186.453-1.309 1.078l-.446 3.946c-.061.631.145 1.176.633 1.532.487.354 2.026 1.449 2.026 1.449s.328-2.835.42-3.651c.093-.815.551-1.378 1.424-1.335.092.004 1.859.178 2.018.178z"/>
              </svg>
              <p>Dépannages</p>
            </RouterLink>

            <RouterLink to="/add-locatier" class="sidebar-link trending">
              <svg viewBox="0 0 24 24" fill="currentColor" height="32" width="32" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 2c5.519 0 10 4.481 10 10s-4.481 10-10 10-10-4.481-10-10 4.481-10 10-10zm2 12v-3l5 4-5 4v-3h-9v-2h9zm-4-6v-3l-5 4 5 4v-3h9v-2h-9z"/></svg>
              <p>Locatiers</p>
            </RouterLink>
       
            <RouterLink to="/Statistiques" class="sidebar-link trending">
              <svg xmlns="http://www.w3.org/2000/svg"  height="32" width="32" viewBox="0 0 24 24" fill="currentColor">
              <path d="M24 3.875l-6 1.221 1.716 1.708-5.351 5.358-3.001-3.002-7.336 7.242 1.41 1.418 5.922-5.834 2.991 2.993 6.781-6.762 1.667 1.66 1.201-6.002zm0 16.125v2h-24v-20h2v18h22z"/></svg>
              <p>Statistiques</p>
            </RouterLink>

		      </div>
        </div>
     <div class="flex"></div> 
	</aside>
</template>

<style  scoped>

aside {
  position: fixed;
  height:100%;
  z-index: 999;
  display: flex;
  flex-direction: column;
  align-items: left;
  justify-content: center;
  background-color: #1e293b;
  color: var(--light);
  width: calc(2rem + 32px);
  overflow: hidden;
  min-height: 100vh;
  padding: 1rem;
  transition: 0.2s ease-in-out;
}

aside .flex {
  flex: 1 1 0%;
}


aside .menu-toggle-wrap {
  display: flex;
  justify-content: flex-end;
  background-color: none;
  margin-bottom: 1rem;
  margin-top: 50px; 
  position: relative;
  top: 0;
  transition: 0.2s ease-in-out;
} 

aside .menu-toggle-wrap .menu-toggle {
  transition: 0.2s ease-in-out;
  
}
 aside .menu-toggle-wrap .menu-toggle:hover a {
  color: #fff;
  transform: translateX(0.5rem);
} 
aside h3, aside p {
  opacity: 0;
  transition: opacity 0.3s ease-in-out;
} 

aside svg .menu-toggle{
  background-color: none;
}


aside h3 {
  color: #64748b;
  padding-left:20px; 
  font-size: 1rem;
  margin-bottom: 10px;
  text-transform: uppercase;
 
}

aside .menu {
  margin: 0 -1rem;
  display: flex;
  flex-direction: column;
  color: #fff;
}
aside .menu .button {
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: 0.2s ease-in-out;
  padding: 0.5rem 1rem;
}
aside .menu .button .text {
  color: #fff; 
  transition: 0.2s ease-in-out;
} 

/* ----- LARGE ----- */
 aside.is-expanded {
  width: 300px;
}
aside.is-expanded .menu-toggle-wrap {
  top: -3rem;
}
aside.is-expanded .menu-toggle-wrap .menu-toggle {
  transform: rotate(-180deg);
}
aside.is-expanded h3, aside.is-expanded p {
  opacity: 1;
  padding-top: 20px;
  /* margin:0; */
} 

/* --- */ 

@media (max-width: 1024px) {
  aside {
    position: fixed;
    z-index: 99;
    height: 100%;
  }
}

aside .sidebar {
  position: fixed;
  height: 100vh;
}

aside .sidebar-link:hover, aside .sidebar-link.router-link-active {
  color: #fff;
  font-weight: 600;
  
} 
aside .sidebar-link:hover:nth-child(2n + 1) svg, aside .sidebar-link.router-link-active:nth-child(2n + 1) svg {
  background: #ff7551;
  border-radius: 5px;
  padding: 3px;
}
aside .sidebar-link:hover:nth-child(2n) svg, aside .sidebar-link.router-link-active:nth-child(2n) svg {
  background: #32a7e2;
  border-radius: 5px;
  padding: 2px;
} 
 aside .sidebar-link:hover:nth-child(2n + 3) svg, aside .sidebar-link.router-link-active:nth-child(2n + 3) svg {
  background: #6c5ecf;
  border-radius: 5px;
  padding: 2px;
}
aside .sidebar.collapse {
  width: 100px;
}

/* ----- LOGO NOT EXPAND -----*/
aside .sidebar.collapse .logo-expand, aside .sidebar.collapse .side-title p {
  display: none;
}
/* ------------------------- */

aside .sidebar.collapse .side-wrapper {
  width: 40px;
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

aside .side-menu a + a {
  margin-top: 26px;
}

aside .side-menu svg {
  width: 35px;
  height: 35px;
  padding: 10px;
  border-radius: 10px;
  background-color: var(--button-bg);
  flex-shrink: 0;
  margin-right: 16px;
}
aside .side-menu svg:hover {
  color: #fff;
}


aside .sidebar-link {
    color: #64748b;
    text-decoration: none;
    margin-left: 20px; 
    padding: 0px 0px 0px 11px;
    display: flex;
    overflow: none;
    align-items: flex-end;
    justify-content: flex-start;
    align-content: space-between;
    flex-wrap: wrap;
    flex-direction: row;
}

aside .sidebar-link p {
  padding-left: 11px;
  font-size: 18px;
}

aside .side-wrapper {
  border-bottom: 1px solid var(--border-color);
  padding: 36px 0;
  width: 145px;
}
button.menu-toggle{
  background-color:#1e293b;
  border: none;
}


</style>