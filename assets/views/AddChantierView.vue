<template>
  <main>

    <form id="formulaire" @submit.prevent="send">
      <h1 class="titre" >Ajouter un nouveau chantier : </h1>

      <div class="row-3">
          <!-- INTITULE -->
          <div class="group-form">
          <label>Intitulé* : </label>
          <input class="form" v-model="intitule" type="text" name="intitule" required />
          </div>
          <!-- <br /> -->
     
          <!-- ADRESSE -->
          <div class="group-form">
          <label>Adresse* : </label>
          <input class="form" v-model="adresse" type="text" name="adresse" required />
          </div>
          <!-- <br /> -->
      
          <!-- VILLE -->
          <div class="group-form">
          <label>Ville* : </label>
          <input class="form" v-model="ville" type="text" name="ville" required />
          </div>
          <!-- <br /> -->
      

          <!-- CODE POSTAL -->
          <div class="group-form">
          <label>Code Postal: </label>
          <input class="form" v-model="codePostal" type="text" name="codePostal" required />
          <!-- <br /> -->
          </div>
     
          <!-- DATE CREATION -->
          <div class="group-form">
          <label>Date de creation* : </label>
          <input class="form" v-model="date" type="date" name="date" required />
          <!-- <br /> -->
          </div>
     
          <!-- DUREE DE TRAVAUX -->
          <div class="group-form">
          <label>Durée de Travaux: </label>
          <input class="form" v-model="dureeTravaux" type="number" name="dureeTravaux" required />
          <!-- <br /> -->
          </div>
        
    
          <!-- TRAVAUX SUPPLEMENTAIRE -->
          <div class="group-form">
          <label>Travaux supplémentaire: </label>
          <input  class="form" v-model="travauxSupl" type="number" step="0.01" name="travauxSupl" />
          <!-- <br /> -->
          </div>

          <!-- DISTANCE -->
          <div class="group-form">
          <label>Distance* : </label>
          <input class="form" v-model="distance" type="number" step="0.01" name="distance" required />
          <!-- <br /> -->
          </div>
      </div>

      <div class="row-2">
          <!-- NOTE PERSO -->
          <div class="group-form">
          <label>Note Personnelle : </label>
          <textarea v-model="notePerso" type="text" name="notePerso"></textarea>
          <!-- <br /> -->
          </div>

          <!-- NOTE CLIENT -->
          <div class="group-form">
          <label>Note Client : </label>
          <textarea v-model="noteClient" type="text" name="noteClient"></textarea>
          <!-- <br /> -->
          </div>
     </div>

      
          <!-- URGENT -->
          <div class="checkbox">
            <label>Urgent: </label>
              <div class="checkBut">
                  <input class="p-10" v-model="urgent" type="radio" name="urgent" value="false" checked />
                  <label class="p-10">Non </label>
                  <input class="p-10" v-model="urgent" type="radio" name="urgent" value="true" />
                  <label class="p-10">Oui</label>
              </div>
         
              <!-- <br /> -->
            

          <!-- TYPE CHANTIER -->
         
            <label>Type Chantier: </label>
              <div class="checkBut">
                <input class="p-10" v-model="typeChantier" type="radio" name="typeChantier" value="Intérieur" checked/>
                <label class="p-10">Intérieur</label>
                <input class="p-10" v-model="typeChantier" type="radio" name="typeChantier" value="Exterieur" />
                <label class="p-10">Extérieur </label>
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
          if (response.status === 200) {
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
  mounted() {
    this.getCategoriesChantier();
  },
};
</script>

<style scoped>
 
main {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 0 solid rgba(0,0,0,.2);
    border-radius: 0.475rem;
    box-shadow: 0 0.25rem 0.5rem rgb(0 0 0 / 10%);
    outline: 0;
    /* overflow-y: auto;
    margin-bottom: 3.75rem;
    margin-top: 3.75rem;
    margin-right: 10%;
    margin-left: 15%;  */
    padding-left: 5rem;  
}

form {
  position: relative;
  width: auto;
  margin: 0.5rem;
  font-size: 14px;
  color: #181c32;
  display: flex;
  flex-direction: column;
}

form h1 {
  font-weight: 600;
  line-height: 1.2;
  color: #181c32;
  display: block ;
  margin-bottom: 0.75rem;
  font-size: calc(1.3rem + .6vw);
  text-align: center; 
}

form .form, textarea{
  -webkit-appearance: none;
  background-color: #fff;
  background-image: none;
  border-radius: 4px;
  border: 1px solid #dcdfe6;
  box-sizing: border-box;
  color: #606266;
  display: inline-block;
  font-size: inherit;
  height: 40px;
  line-height: 40px;
  outline: 0;
  padding: 0 15px;
  transition: 0.2s cubic-bezier(0.645,0.045,0.355,1);
  width: 100%;
}

textarea{
  height: 100px;
}

form .row-3{
  display:flex;
  flex-wrap: wrap ;
  justify-content:flex-start ;
  /* width:100%; */
}

form .row-2{
  display:flex;
  flex-wrap: wrap ;
  justify-content:flex-start ;
  align-items: center;
}

form .group-form{
  margin: 1rem;
  width:30%;
  
}

form label {
  font-weight: 500;
  font-size: 1.075rem;
  margin-bottom: .5rem;
  color:#606266;
}

form .checkbox{
  display:flex;
  justify-content: space-around;
  align-items: baseline;

}
form .checkBut {
  align-items: baseline;
  display: flex;
  justify-content: center;
}

form .p-10{
  padding:10px;
}

form button{
  padding: 0.825rem 1.75rem;
  font-size: 1.15rem;
  border-radius: 0.625rem;
  display: inline-block;
  font-weight: 500;
  line-height: 1.5;
  text-align: center;
  background-color: #009ef7;
  border: none;
  color: #fff;
  width: 250px;
}

.center {
  display: flex;
  align-items: center;
  justify-content: center;
}

form button:hover {
  background-color:#6672b4;
}

/* ----- MEDIA QUERIES ----- */ 

/* Extra small devices (phones, 600px and down) */
@media  (max-width:900px) {

  form .group-form{
    margin: 0;
    width: 100%;
  }

  form .row-3 {
    flex-direction: column;
    justify-content: space-around
  }
  .checkbox{
    flex-direction: column;
  }
}
</style>
