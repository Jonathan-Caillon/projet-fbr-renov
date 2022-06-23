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
      try{
        let response = await fetch("/api/clients", myData)
          if (response.status === 201) {
            const data = await response.json();
            // sweetAlert
            this.$swal.fire({
              position: "center",
              icon: "success",
              title: "Le fichier a bien été envoyé",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              window.location.reload();
            }, 2000);
            console.log("Success:", data);
          }
       
      }catch(error){
          // sweetAlert
          this.$swal.fire({
            position: "center",
            icon: "error",
            title: "Oops...",
            text: "Le fichier n'a pas été envoyé!",
          });
          console.error("Error:", error);
      }
      
    },

  },
};
</script>

<style scoped>
@import "@/styles/Form.css";
</style>
