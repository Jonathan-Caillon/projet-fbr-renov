<template>
  <main>
    <form id="formulaire" @submit.prevent="send">
      <h1 class="titre">Ajouter un nouveau client :</h1>

      <div class="row-3">
        <!--NOM-->
        <div class="group-form">
          <label>Nom* : </label>
          <input class="form" v-model="nom" type="text" name="nom" required />
        </div>
        <!-- <br /> -->

        <!--PRENOM-->
        <div class="group-form">
          <label>Prénom* : </label>
          <input
            class="form"
            v-model="prenom"
            type="text"
            name="prenom"
            required
          />
        </div>
        <!-- <br /> -->

        <!--COMMUNE-->
        <div class="group-form">
          <label>Commune* : </label>
          <input
            class="form"
            v-model="ville"
            type="text"
            name="ville"
            required
          />
        </div>
        <!-- <br /> -->

        <!--ADRESSE-->
        <div class="group-form">
          <label>Adresse* : </label>
          <input
            class="form"
            v-model="adresse"
            type="text"
            name="adresse"
            required
          />
        </div>
        <!-- <br /> -->

        <!--CP-->
        <div class="group-form">
          <label>Code Postal* : </label>
          <input
            class="form"
            v-model="codePostal"
            type="text"
            name="codePostal"
            required
          />
        </div>
        <!-- <br /> -->

        <!--TELEPHONE-->
        <div class="group-form">
          <label>Téléphone* : </label>
          <input
            class="form"
            v-model="telephone"
            type="telephone"
            name="telephone"
            required
          />
        </div>
        <!-- <br /> -->

        <!--MAIL-->
        <div class="group-form">
          <label>E-mail : </label>
          <input class="form" v-model="mail" type="email" name="email" />
        </div>
        <!-- <br /> -->

        <!--RAISON SOCIALE-->
        <div class="group-form">
          <label>Raison sociale : </label>
          <input
            class="form"
            v-model="raisonSociale"
            type="text"
            name="raisonSociale"
          />
        </div>
        <!-- <br /> -->
      </div>

      <div class="center">
        <button type="submit">Ajouter</button>
      </div>

      <!-- <a :href="'/addChantier/' +dataId">Créer un chantier</a> -->
    </form>
  </main>
</template>

<script>
export default {
  data() {
    return {
      nom: null,
      prenom: null,
      ville: null,
      adresse: null,
      codePostal: null,
      telephone: null,
      email: null,
      raisonSociale: null,
      dataId: "",
    };
  },
  methods: {
    async send() {
      let urgentForm = false;
      if (this.urgent == "true") {
        urgentForm = true;
      }
      let form = {
        nom: this.nom,
        prenom: this.prenom,
        ville: this.ville,
        adresse: this.adresse,
        codePostal: this.codePostal,
        telephone: this.telephone,
        email: this.mail,
        raisonSociale: this.raisonSociale,
      };

      const headers = new Headers({
        "Content-Type": "application/json",
        Accept: "application/json",
      });
      let myData = {
        method: "POST",
        headers: headers,
        mode: "cors",
        cache: "default",
        body: JSON.stringify(form),
      };
      await fetch("/api/clients", myData)
        .then(async (response) => {
          if (response.status === 201) {
            const data = await response.json();
            location.reload();
            console.log("Success:", data);
            // console.log(data.id)
            // this.dataId = data.id
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
  },
};
</script>

<style scoped>
@import "@/styles/Form.css";
</style>
