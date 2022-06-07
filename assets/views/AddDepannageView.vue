<template>
  <main>
    <form id="formulaire" @submit.prevent="send">
      <h1>Ajouter un depannage :</h1>

      <div class="row-3">
        <!-- INTITULE -->
        <div class="group-form">
          <label>Intitulé* : </label>
          <input
            class="form"
            v-model="intitule"
            type="text"
            name="intitule"
            required
          />
        </div>
        <!-- <br /> -->

        <!-- NUMERO -->
        <div class="group-form">
          <label>Numéro d'intervention* : </label>
          <input
            class="form"
            v-model="numeroIntervention"
            type="number"
            name="numeroIntervention"
            required
          />
        </div>
        <!-- <br /> -->

        <!-- COMMUNE -->
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

        <!-- ADRESSE -->
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

        <!-- CP -->
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

        <!-- HORAIRE -->
        <div class="group-form">
          <label>Horaire* : </label>

          <select
            v-model="horaireDepannage"
            type="text"
            name="horaireDepannage"
          >
            <option value="" disabled selected>
              Choisir un horaire...
            </option>
            <option>Jour</option>
            <option>Nuit</option>
            <option>Week-end</option>
          </select>
        </div>

        <!-- PRIX -->
        <div class="group-form">
          <label>Prix* : </label>
          <input
            class="form"
            v-model="prixDepannage"
            type="number"
            step="0.01"
            name="prixDepannage"
          />
        </div>
        <!-- <br /> -->

        <!-- DISTANCE -->
        <div class="group-form">
          <label>Distance* : </label>
          <input
            class="form"
            v-model="distance"
            type="number"
            step="0.01"
            name="distance"
          />
        </div>
        <!-- <br /> -->
      </div>

      <div class="row-2">
        <!--NOTE PERSO -->
        <div class="group-form">
          <label>Note Personnelle : </label>
          <textarea
            class="form"
            v-model="notePerso"
            type="text"
            name="notePerso"
          ></textarea>
        </div>
        <!-- <br /> -->
      </div>

      <div class="center">
        <button type="submit">Envoyer</button>
      </div>
    </form>
  </main>
</template>

<script>

export default {
  data() {
    return {
      intitule: null,
      ville: null,
      adresse: null,
      codePostal: null,
      prixDepannage: null,
      horaireDepannage: "",
      distance: null,
      notePerso: null,
    };
  },
  methods: {
    async send() {
      let form = {
        intitule: this.intitule,
        numeroIntervention: this.numeroIntervention,
        ville: this.ville,
        adresse: this.adresse,
        codePostal: this.codePostal,
        prixDepannage: this.prixDepannage,
        horaireDepannage: this.horaireDepannage,
        distance: this.distance,
        notePerso: this.notePerso,
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
      await fetch("/api/depannages", myData)
        .then(async (response) => {
          if (response.status === 201) {
            const data = await response.json();
            location.reload();
            console.log("Success:", data);
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
