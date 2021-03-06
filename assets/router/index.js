import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    // {
    //   path: "/about",
    //   name: "about",
    //   component: () => import("../views/AboutView.vue"),
    // },
    {
      name: "list-clients",
      path: "/list-clients",
      component: () => import("../views/ListClientsView.vue"),
    },
    {
      path: "/list-clients/:idClient",
      name: "list-clients-id",
      props: true,
      component: () => import("../views/ClientProfileView.vue"),
      children: [
        {
          path: "",
          name: "client-chantier-list",
          props: true,
          component: () => import("../components/client/ClientList.vue"),
        },
        {
          path: "chantier/:idChantier/details",
          name: "client-chantier-id",
          props: true,
          component: () => import("../views/ClientChantierView.vue"),
        },
        {
          path: "chantier/:idChantier/edit-chantier",
          name: "client-chantier-edit",
          props: true,
          component: () => import("../components/client/ClientChantierEdit.vue"),
        },
        {
          path: "chantier/:idChantier/add-devis",
          name: "client-chantier-devis-id",
          props: true,
          component: () => import("../views/AddDevisView.vue"),
        },
        {
          path: "chantier/:idChantier/edit-devis/:idDevis",
          name: "client-chantier-edit-devis-id",
          props: true,
          component: () => import("../components/client/EditDevis.vue"),
        },
      ],
    },
    {
      path: "/edit-client/:idClient",
      name: "edit-client",
      props: true,
      component: () => import("../views/EditClientView.vue"),
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
      path: "/list-locatiers",
      name: "list-locatiers",
      component: () => import("../views/ListLocatiersView.vue"),
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
      component: () => import("../views/LocationView.vue"),
    },
    {
      path: "/add-devis",
      name: "add-devis",
      props: true,
      component: () => import("../views/AddDevisView.vue"),
    },
    // {
    //   path: "/login",
    //   name: "login",
    //   component: () => import("../views/LoginView.vue"),
    // },
    {
      path: "/404",
      name: "404",
      component: () => import("../views/404View.vue"),
    },
    {
      path: "/:catchAll(.*)",
      name: "404",
      component: () => import("../views/404View.vue"),
    },
  ],
});

export default router;
