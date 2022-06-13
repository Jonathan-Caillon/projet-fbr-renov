<template>
  <main>
    <form id="formulaire" @submit.prevent="send">
      <h1 class="titre">Ajouter un nouveau client :</h1>

      <div class="row-3">
        <!--NOM-->
        <div class="group-form">
          <label class="required">Nom </label>
          <input
            placeholder="nom"
            class="form"
            v-model="nom"
            type="text"
            name="nom"
            required
          />
          <!-- <p v-if="!nomIsValid" class="error-message">Le champs est vide</p> -->
        </div>
        <!-- <br /> -->

        <!--PRENOM-->
        <div class="group-form">
          <label class="required">Prénom </label>
          <input
            placeholder="prénom"
            class="form"
            v-model="prenom"
            type="text"
            name="prenom"
            required
          />
          <!-- <p v-if="!prenomIsValid" class="error-message">Le champs est vide</p> -->
        </div>
        <!-- <br /> -->

        <!--COMMUNE-->
        <div class="group-form">
          <label class="required">Commune </label>
          <input
            placeholder="commune"
            class="form"
            v-model="ville"
            type="text"
            name="ville"
            required
          />
          <!-- <p v-if="!villeIsValid" class="error-message">Le champs est vide</p> -->
        </div>
        <!-- <br /> -->

        <!--ADRESSE-->
        <div class="group-form">
          <label class="required">Adresse </label>
          <input
            placeholder="adresse"
            class="form"
            v-model="adresse"
            type="text"
            name="adresse"
            required
          />
          <!-- <p v-if="!adresseIsValid" class="error-message">Le champs est vide</p> -->
        </div>
        <!-- <br /> -->

        <!--CP-->
        <div class="group-form">
          <label class="required">Code Postal </label>
          <input
            placeholder="code postal"
            class="form"
            v-model="codePostal"
            type="text"
            name="codePostal"
            required
          />
          <!-- <p v-if="!codePostalIsValid" class="error-message">Le champs est vide</p> -->
        </div>
        <!-- <br /> -->

        <!--TELEPHONE-->
        <div class="group-form">
          <label class="required">Téléphone </label>
          <input
            placeholder="téléphone"
            class="form"
            v-model="telephone"
            type="telephone"
            name="telephone"
            required
          />
          <!-- <p v-if="!telephoneIsValid" class="error-message">Le champs est vide</p> -->
        </div>
        <!-- <br /> -->

        <!--MAIL-->
        <div class="group-form">
          <label>E-mail : </label>
          <input
            placeholder="email"
            class="form"
            v-model="mail"
            type="email"
            name="email"
          />
        </div>
        <!-- <br /> -->

        <!--RAISON SOCIALE-->
        <div class="group-form">
          <label>Raison sociale : </label>
          <input
            placeholder="raison sociale"
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

  // computed: {
    /*--- VALIDATION FORM ---*/
    // nomIsValid() {
    //   return !!this.$data.nom;
    // },
    // prenomIsValid() {
    //   return !!this.$data.prenom;
    // },
    // villeIsValid() {
    //   return !!this.$data.ville;
    // },
    // adresseIsValid() {
    //   return !!this.$data.adresse;
    // },
    // codePostalIsValid() {
    //   return !!this.$data.codePostal;
    // },
    // telephoneIsValid() {
    //   return !!this.$data.telephone;
    // },
    // formIsValid(){
    //   return this.nomIsValid &&
    //     this.prenomIsValid &&
    //     this.villeIsValid &&
    //     this.adresseIsValid &&
    //     this.codePostalIsValid &&
    //     this.telephoneIsValid;
    // },

    /* --- */
  // },

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

    /*--- VALIDATION FORM ---*/
    // send() {
    //   if (this.formIsValid) {
    //     console.log("formulaire soumis", this.$data);
    //   } else {
    //     console.log("invalide");
    //   }
    // },
    /* ---- */
  },
};
</script>

<style scoped>
@import "@/styles/Form.css";
</style>
