<template>
  <main>
    <form id="formulaire" @submit.prevent="send">
      <h1>Ajouter un depannage :</h1>

      <div class="row-3">
        <!-- INTITULE -->
        <div class="group-form">
          <label class="required">Intitulé </label>
          <input
            placeholder="intitulé"
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
          <label class="required">Numéro d'intervention </label>
          <input
            placeholder="N°intervention"
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

        <!-- ADRESSE -->
        <div class="group-form">
          <label class="required">Adresse</label>
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

        <!-- CP -->
        <div class="group-form">
          <label class="required">Code Postal</label>
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

        <!-- HORAIRE -->
        <div class="group-form">
          <label class="required">Horaire </label>

          <select
            v-model="horaireDepannage"
            type="text"
            name="horaireDepannage"
          >
            <option value="" disabled selected>Choisir un horaire...</option>
            <option>Jour</option>
            <option>Nuit</option>
            <option>Week-end</option>
          </select>
        </div>

        <!-- PRIX -->
        <div class="group-form">
          <label class="required">Prix </label>
          <input
            placeholder="prix"
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
          <label class="required">Distance </label>
          <input
            placeholder="distance"
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
          } if(response.status === 422){
            const rep = response.statusText;
            console.log(rep);
            // let messageErreur = rep.violations[0].message;
            
            this.$swal.fire({
              position: "center",
              icon: "error",
              title: messageErreur,
              showConfirmButton: false,
              timer: 1500,
            });
          } else if ((error) => {
          // sweetAlert
          this.$swal.fire({
            position: "center",
            icon: "error",
            title: "Oops...",
            text: "Le fichier n'a pas été envoyé!",
          });
          console.error("Error:", error);
        });
        })
        
    },
  },
};
</script>

<style scoped>
@import "@/styles/Form.css";
</style>
