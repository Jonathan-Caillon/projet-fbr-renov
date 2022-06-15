<template>
  <main>
    <form id="formulaire" @submit.prevent="send(this.idClient)">
      <h1 class="titre">Editer un client :</h1>

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
        </div>

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
        </div>

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
        </div>

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
        </div>
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
        </div>

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
        </div>

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
      </div>

      <div class="center">
        <button type="submit">Editer</button>
      </div>
    </form>
  </main>
</template>

<script>
export default {
  props: ["idClient"],
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
    async getClient(id) {
      const headers = new Headers({
        "Content-Type": "application/json",
        Accept: "application/json",
      });
      let getData = {
        method: "GET",
        headers: headers,
        mode: "cors",
        cache: "default",
      };
      try {
        let response = await fetch(`/api/clients/${id}`, getData);
        if (response.status === 200) {
          let data = await response.json();
          this.nom = data.nom;
          this.prenom = data.prenom;
          this.ville = data.ville;
          this.adresse = data.adresse;
          this.codePostal = data.codePostal;
          this.telephone = data.telephone;
          this.email = data.email;
          this.raisonSociale = data.raisonSociale;
        }
        if (response.status === 404) {
          this.$router.push("/404");
        }
      } catch (err) {
        console.error(err);
      }
    },
    async send(id) {
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
        method: "PUT",
        headers: headers,
        mode: "cors",
        cache: "default",
        body: JSON.stringify(form),
      };
      await fetch(`/api/clients/${id}`, myData)
        .then(async (response) => {
          if (response.status === 200) {
            this.$router.push(`/list-clients/${id}`);
            console.log("Success:", data);
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
  },
  mounted() {
    this.getClient(this.idClient);
  },
};
</script>

<style scoped>
@import "@/styles/Form.css";
</style>
