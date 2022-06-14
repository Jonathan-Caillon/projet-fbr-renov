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

<<<<<<< HEAD
//SWEETALERT
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
=======
//Sweetalert2
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

>>>>>>> f8f35d4a88fb644765b053d483091107b6d1b7c2
//ICONE
import '@fortawesome/fontawesome-free/js/all'


<<<<<<< HEAD
createApp(App).use(router).use(VueSweetalert2).mount('#app');
=======
createApp(App).use(router).use(VueSweetalert2).mount('#app');
>>>>>>> f8f35d4a88fb644765b053d483091107b6d1b7c2
