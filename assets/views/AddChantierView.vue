<template>
  <main>

    <form id="formulaire" @submit.prevent="send">
      <h1>Ajouter un nouveau chantier : </h1>

      <div class="row-3">
          <!-- INTITULE -->
          <div class="group-form">
          <label class="required" >Intitulé</label>
          <input placeholder="intitulé" class="form" v-model="intitule" type="text" name="intitule" required />
          </div>
          <!-- <br /> -->
          <!-- CATEGORIE -->
          <div class="group-form">
          <label>Catégorie chantier : </label>
          <select v-model="category" type="text" name="category" >
          <option value="" disabled selected>Choisir une catégorie...</option>
          <option v-for="cat in data" :key="cat" :value="'/api/categorie_chantiers/'+cat.id" > {{ cat.NomCategorie }} </option>
          </select>
          </div>
          <!-- ADRESSE -->
          <div class="group-form">
          <label class="required" >Adresse </label>
          <input placeholder="adresse" class="form" v-model="adresse" type="text" name="adresse" required />
          </div>
          <!-- <br /> -->
      
          <!-- VILLE -->
          <div class="group-form">
          <label class="required" >Ville </label>
          <input placeholder="ville" class="form" v-model="ville" type="text" name="ville" required />
          </div>
          <!-- <br /> -->
      

          <!-- CODE POSTAL -->
          <div class="group-form">
          <label class="required" >Code Postal </label>
          <input  placeholder="code postal" class="form" v-model="codePostal" type="text" name="codePostal" required />
          <!-- <br /> -->
          </div>
     
          <!-- DATE CREATION -->
          <div class="group-form">
          <label class="required" >Date de creation </label>
          <input class="form" v-model="date" type="date" name="date" required />
          <!-- <br /> -->
          </div>
     
          <!-- DUREE DE TRAVAUX -->
          <div class="group-form">
          <label class="required" >Durée de Travaux </label>
          <input placeholder="durée" class="form" v-model="dureeTravaux" type="number" name="dureeTravaux" required />
          <!-- <br /> -->
          </div>
        
    
          <!-- TRAVAUX SUPPLEMENTAIRE -->
          <div class="group-form">
          <label>Travaux supplémentaire : </label>
          <input  placeholder="travaus supplémentaires" class="form" v-model="travauxSupl" type="number" step="0.01" name="travauxSupl" />
          <!-- <br /> -->
          </div>

          <!-- DISTANCE -->
          <div class="group-form">
          <label class="required"  >Distance </label>
          <input  placeholder="Distance" class="form" v-model="distance" type="number" step="0.01" name="distance" required />
          <!-- <br /> -->
          </div>
      </div>

      <div class="row-2">
          <!-- NOTE PERSO -->
          <div class="group-form">
          <label>Note Personnelle : </label>
          <textarea  class="form" v-model="notePerso" type="text" name="notePerso"></textarea>
          <!-- <br /> -->
          </div>

          <!-- NOTE CLIENT -->
          <div class="group-form">
          <label>Note Client : </label>
          <textarea  class="form" v-model="noteClient" type="text" name="noteClient"></textarea>
          <!-- <br /> -->
          </div>
          </div>

      
          <!-- URGENT -->
        <div class="BoxCheck">
          <div class="checkbox">
            <label>Urgent: </label>
              <div class="checkBut">
                  <input class="form-check-input" v-model="urgent" type="radio" name="urgent" value="false" checked />
                  <label class="p-10">Non </label>
                  <input class="form-check-input" v-model="urgent" type="radio" name="urgent" value="true" />
                  <label class="p-10">Oui</label>
              </div>
            </div>
         
              <!-- <br /> -->
            

          <!-- TYPE CHANTIER -->
           <div class="checkbox">
            <label>Type Chantier: </label>
              <div class="checkBut">
                <input class="form-check-input" v-model="typeChantier" type="radio" name="typeChantier" value="Intérieur" checked/>
                <label class="p-10">Intérieur</label>
                <input class="form-check-input" v-model="typeChantier" type="radio" name="typeChantier" value="Exterieur" />
                <label class="p-10">Extérieur </label>
              </div> 
          </div>
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
      adresse: null,
      ville: null,
      codePostal: null,
      date: null,
      dureeTravaux: null,
      travauxSupl: null,
      distance: null,
      notePerso: null,
      noteClient: null,
      urgent: null,
      typeChantier: "",
      category: "",
      data: ""
    };
  },
  methods: {
    async getCategoriesChantier() {
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
      await fetch("/api/categorie_chantiers", getData)
        .then(async (response) => {
          if (response.status === 200) {
            this.data = await response.json();
            console.log("Success:", this.data);
            
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
    async send() {
      let urgentForm = false;
      if (this.urgent == "true") {
        urgentForm = true;
      }
      let typeCHantierForm = "Interieur";
      if (this.typeChantier == "Exterieur") {
        typeCHantierForm = "Exterieur";
      }
      let form = {
        intitule: this.intitule,
        adresse: this.adresse,
        ville: this.ville,
        codePostal: this.codePostal,
        date: this.date,
        dureeTravaux: this.dureeTravaux,
        travauxSupl: this.travauxSupl,
        distance: this.distance,
        notePerso: this.notePerso,
        noteClient: this.noteClient,
        urgent: urgentForm,
        typeChantier: typeCHantierForm,
        category: [this.category]
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
      await fetch("/api/chantiers", myData)
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
    /*error*/
  },
  mounted() {
    this.getCategoriesChantier();
  },
};
</script>

<style scoped>
  @import "@/styles/Form.css"; 
</style>