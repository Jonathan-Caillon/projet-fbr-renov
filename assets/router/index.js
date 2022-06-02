import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import ListClientsView from "../views/ListClientsView.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/about",
      name: "about",
      component: () => import("../views/AboutView.vue"),
    },
    {
      path: "/list-clients",
      name: "list-clients",
      component: ListClientsView,
    },
    {
      path: "/list-chantiers",
      name: "list-chantiers",
      component: () => import("../views/ListChantiersView.vue"),
    },
    {
      path: "/list-depannages",
      name: "list-depannages",
      component: () => import("../views/ListDepannageView.vue"),
    },
    {
      path: "/add-client",
      name: "add-client",
      component: () => import("../views/AddClientView.vue"),
    },
    {
      path: "/add-chantier",
      name: "add-chantier",
      props: true,
      component: () => import("../views/AddChantierView.vue"),
    },
    {
      path: "/add-depannage",
      name: "add-depannage",
      props: true,
      component: () => import("../views/AddDepannageView.vue"),
    },
    {
      path: "/add-locatier",
      name: "add-locatier",
      props: true,
      component: () => import("../views/AddLocatierView.vue"),
    },
    {
      path: "/add-materiel",
      name: "add-materiel",
      props: true,
      component: () => import("../views/AddMaterielView.vue"),
    },
    {
      path: "/location",
      name: "location",
      props: true,
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import("../views/LocationView.vue"),
    },
    {
      path: "/login",
      name: "login",
      component: () => import("../views/LoginView.vue"),
    },
    {
      path: "/:catchAll(.*)",
      name: "404",
      component: () => import("../views/404View.vue"),
    },
  ],
});

export default router;
