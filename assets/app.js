/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

//SWEETALERT
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
//ICONE
import '@fortawesome/fontawesome-free/js/all'


createApp(App).use(router).use(VueSweetalert2).mount('#app');
