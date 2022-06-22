<template>
  <main>
    <form
      id="formulaireDevis"
      @submit.prevent="send(this.idDevis)"
      enctype="multipart/form-data"
    >
      <h1>Editer devis :</h1>

      <div class="row-3">
        <!-- NUMERO DEVIS -->
        <div class="group-form">
          <label class="required">Numéro devis : </label>
          <input
            placeholder="N°devis"
            class="form"
            v-model="numeroDevis"
            type="number"
            name="numeroDevis"
            required
          />
        </div>

        <!-- PRIX -->
        <div class="group-form">
          <label class="required">Prix : </label>
          <input
            placeholder="prix"
            class="form"
            id="prixDevis"
            v-model="prixDevis"
            type="number"
            name="prixDevis"
            required
          />
        </div>

        <!-- PAIEMENT ACOMPTE -->
        <div class="group-form">
          <label>Paiement acompte : </label>
          <input
            placeholder="acompte"
            class="form"
            id="payAc"
            v-model="paiementAcompte"
            type="number"
            name="paiementAcompte"
          />
        </div>

        <!-- PAIEMENT INTERMEDIAIRE -->
        <div class="group-form">
          <label>Paiement Intermediaire : </label>
          <input
            placeholder="paiement intermédiaire"
            class="form"
            id="payIn"
            v-model="paiementIntermed"
            type="number"
            name="paiementIntermed"
          />
        </div>

        <!-- PAIEMENT FINAL -->
        <div class="group-form">
          <label>Paiement final : </label>
          <input
            placeholder="paiement final"
            class="form"
            readonly
            id="payF"
            type="number"
            v-model="paiementFinal"
            name="paimentFinalForm"
          />
        </div>

        <!-- STATUT -->
        <div class="group-form">
          <label class="required">Statut : </label>
          <select v-model="statut" name="statut">
            <option value="" disabled selected>
              Choisir un statut du devis...
            </option>
            <option value="attente">Devis en attente</option>
            <option value="accepter">Devis accepté</option>
            <option value="refuser">Devis refusé</option>
          </select>
        </div>
        <!-- Document -->
        <div class="group-form">
          <label>Document : </label>
          <input id="file" class="form" type="file" name="file"/>
        </div>
        <div v-if="this.filePath" class="group-form">
            <label>Document actuel : </label>
            <router-link title="Document" class="link-doc" target="_blank" :to='"/document/devis/" + this.filePath'>Document actuel</router-link>
        </div>
        
        <input type="hidden" name="chantier" v-model="chantier" />
      </div>

      <div class="center">
        <button type="submit">Envoyer</button>
      </div>
    </form>
  </main>
</template>

<script>
import Swal from "sweetalert2";
export default {
  props: ["idChantier","idDevis"],
  data() {
    return {
      numeroDevis: null,
      prixDevis: null,
      statut: "",
      chantier: null,
      paiementAcompte: null,
      paiementIntermed: null,
      paiementFinal: null,
      filePath: null,
      data: "",
    };
  },
  methods: {
    async send(id) {
      let formulaire = document.getElementById("formulaireDevis");
      let formData = new FormData(formulaire);
      Swal.fire({
        title: "Souhaitez-vous enregistrer votre devis ?",
        showDenyButton: true,
        confirmButtonText: "Enregistrer",
        denyButtonText: `Annuler`,
      }).then((result) => {
        if (result.isConfirmed) {
          let request = new XMLHttpRequest();
          request.open("PUT", `/api/devis/${id}`);
          request.send(formData);
          request.onload = () => {
            let json = JSON.parse(request.responseText);
            console.log(json);
            if (request.status === 201) {
              Swal.fire({
                title: "Enregistré",
                confirmButtonText: "Ok",
              }).then(() => {
                this.$router.push(`/list-clients/1/chantier/${idChantier}/details`)
              });
            }
            if (request.status === 422) {
              let messageErreur = json.violations[0].message;
              Swal.fire({
                title: messageErreur,
                confirmButtonText: "Ok",
              });
            }
          };
        } else if (result.isDenied) {
          Swal.fire("Votre devis n'a pas été enregistré", "", "info");
        }
      });
    },
    async getChantier(idDevis) {
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
        let response = await fetch(`/api/devis/${idDevis}`, getData);
        if (response.status === 200) {
          let data = await response.json();
          console.log("Success:", data);
          this.numeroDevis = data.numeroDevis;
          this.paiementAcompte = data.paiementAcompte;
          this.paiementIntermed = data.paiementIntermed;
          this.prixDevis = data.prixDevis;
          this.paiementFinal = data.prixDevis - data.paiementAcompte - data.paiementIntermed;
          this.chantier = data.chantier;
          this.filePath = data.filePath;
          this.statut = data.statut;
        }
        if (response.status === 404) {
          this.$router.push("/404");
        }
      } catch (err) {
        console.error(err);
      }
    },
  },
  mounted() {
    let prixDevis = document.getElementById("prixDevis");
    let paiementAcompte = document.getElementById("payAc");
    let paiementIntermed = document.getElementById("payIn");

    prixDevis.addEventListener("input", (e) => {
      this.prixDevis = e.target.value;
      (this.paiementFinal =
        this.prixDevis - this.paiementAcompte - this.paiementIntermed)
    });
    paiementAcompte.addEventListener("input", (e) => {
      this.paiementAcompte = e.target.value;
      (this.paiementFinal =
        this.prixDevis - this.paiementAcompte - this.paiementIntermed)
    });
    paiementIntermed.addEventListener("input", (e) => {
      this.paiementIntermed = e.target.value;
      (this.paiementFinal =
        this.prixDevis - this.paiementAcompte - this.paiementIntermed)
    });
    this.getChantier(this.idDevis)
  },
};
</script>

<style scoped>
@import "@/styles/Form.css";
</style>
