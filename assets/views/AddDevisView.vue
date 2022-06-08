<template>
  <main>
    <form id="formulaire" @submit.prevent="send">
      <h1>Ajouter un devis :</h1>

      <div class="row-3">
        <!-- NUMERO DEVIS -->
        <div class="group-form">
          <label class="required" >Numéro devis </label>
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
          <label class="required" >Prix</label>
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
          <label>Paiement Intermediaire: </label>
          <input
            placeholder="paiement intermédiaire"
            class="form"
            id="payIn"
            v-model="paiementIntermed"
            type="number"
            name="paiementIntermed"
          />
        </div>

<<<<<<< HEAD
      <label for="document">Document : </label>
      <input name="documents" id="documents" type="file"/>

      <input type="hidden" name="chantier" v-model="chantier" />
=======
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
>>>>>>> 8d068378994771da7c3658dcd2f5d2cab39c100c

        <!-- STATUT -->
        <div class="group-form">
          <label class="required" >Statut </label>
          <select v-model="statut" type="text" name="statut">
            <option value="" disabled selected>
              Choisir un statut du devis...
            </option>
            <option value="attente">Devis en attente</option>
            <option value="accepter">Devis accepté</option>
            <option value="refuser">Devis refusé</option>
          </select>
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
export default {
  data() {
    return {
      numeroDevis: null,
      prixDevis: null,
      statut: "",
      paiementAcompte: null,
      paiementIntermed: null,
      paiementFinal: null,
      data: "",
    };
  },
  methods: {
    async send() {
<<<<<<< HEAD
      let doc = document.getElementById("documents").files[0];
=======
>>>>>>> 8d068378994771da7c3658dcd2f5d2cab39c100c
      let form = {
        numeroDevis: this.numeroDevis,
        prixDevis: this.prixDevis,
        statut: this.statut,
        paiementAcompte: this.paiementAcompte,
        paimentIntermed: this.paimentIntermed,
<<<<<<< HEAD
        paiementFinal: this.paiementFinal ,
        documents: this.doc
      };

      console.log(this.doc)
=======
        paiementFinal: this.paiementFinal,
      };

      console.log(this.paiementFinal);
>>>>>>> 8d068378994771da7c3658dcd2f5d2cab39c100c

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
      await fetch("/api/devis", myData)
        .then(async (response) => {
          if (response.status === 201) {
            const data = await response.json();
            console.log("Success:", data);
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
  },
  mounted() {
    let prixDevis = document.getElementById("prixDevis");
    let paiementAcompte = document.getElementById("payAc");
    let paiementIntermed = document.getElementById("payIn");
    prixDevis.addEventListener("input", (e) => {
      this.prixDevis = Number(e.target.value);
      console.log(this.prixDevis);
      (this.paiementFinal =
        this.prixDevis - this.paiementAcompte - this.paiementIntermed),
        console.log(this.paiementFinal);
    });
    paiementAcompte.addEventListener("input", (e) => {
      this.paiementAcompte = Number(e.target.value);
      console.log(this.paiementAcompte);
      (this.paiementFinal =
        this.prixDevis - this.paiementAcompte - this.paiementIntermed),
        console.log(this.paiementFinal);
    });
    paiementIntermed.addEventListener("input", (e) => {
      this.paiementIntermed = Number(e.target.value);
      console.log(this.paiementIntermed);
      (this.paiementFinal =
        this.prixDevis - this.paiementAcompte - this.paiementIntermed),
        console.log(this.paiementFinal);
    });
  },
};
</script>

<style>
@import "@/styles/Form.css";
</style>
