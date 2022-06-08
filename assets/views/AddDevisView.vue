<template>
  <main>
    
    <form id="formulaire" @submit.prevent="send">
      <h1 class="titre" >Ajouter un devis : </h1>
      <label>Numéro devis* : </label>
      <input v-model="numeroDevis" type="number" name="numeroDevis" required >

      <label>Prix* : </label>
      <input id="prixDevis" v-model="prixDevis" type="number" name="prixDevis" required >
    
      <label>Paiement acompte : </label>
      <input id="payAc" v-model="paiementAcompte" type="number" name="paiementAcompte"/>

      <label>Paiement Intermediaire: </label>
      <input id="payIn" v-model="paiementIntermed" type="number" name="paiementIntermed"/>

      <label>Paiement final : </label>
      <input readonly id="payF" type="number" v-model="paiementFinal" name="paimentFinalForm"/>

      <label>Statut* : </label>
      <select v-model="statut" type="text" name="statut" >
        <option value="" disabled selected>Choisir un statut du devis... </option>
        <option value="attente">Devis en attente</option>
        <option value="accepter">Devis accepté</option>
        <option value="refuser">Devis refusé</option>
      </select>

      <label for="document">Document : </label>
      <input name="documents" id="documents" type="file"/>

      <input type="hidden" name="chantier" v-model="chantier" />

      <button type="submit">Envoyer</button>

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
        data: ""

    
    }
    },
    methods: {
    
    async send() {
      let doc = document.getElementById("documents").files[0];
      let form = {
        numeroDevis: this.numeroDevis,
        prixDevis: this.prixDevis,
        statut: this.statut,
        paiementAcompte: this.paiementAcompte,
        paimentIntermed: this.paimentIntermed,
        paiementFinal: this.paiementFinal ,
        documents: this.doc
      };

      console.log(this.doc)

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
        .then( async (response) => {
            if(response.status === 201){
                const data = await response.json();
                console.log("Success:", data);
            }
        }
        )
        .catch((error) => {
          console.error("Error:", error);
        });
    },
  },
  mounted() {
    let prixDevis = document.getElementById("prixDevis");
    let paiementAcompte = document.getElementById("payAc");
    let paiementIntermed = document.getElementById("payIn");
    prixDevis.addEventListener("input", e => {
      this.prixDevis = Number(e.target.value);
      console.log(this.prixDevis)
      this.paiementFinal = this.prixDevis - this.paiementAcompte - this.paiementIntermed,
      console.log(this.paiementFinal)
    })
     paiementAcompte.addEventListener("input", e => {
      this.paiementAcompte = Number(e.target.value);
      console.log(this.paiementAcompte)
      this.paiementFinal = this.prixDevis - this.paiementAcompte - this.paiementIntermed,
      console.log(this.paiementFinal)
    })
     paiementIntermed.addEventListener("input", e => {
      this.paiementIntermed = Number(e.target.value);
      console.log(this.paiementIntermed)
      this.paiementFinal =  this.prixDevis - this.paiementAcompte - this.paiementIntermed,
      console.log(this.paiementFinal)
    })
  }

}
</script>

<style>

</style>