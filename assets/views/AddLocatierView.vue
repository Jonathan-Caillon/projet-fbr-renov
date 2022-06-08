<template>
  <main>
    
     <form id="formulaire" @submit.prevent="send">
       <h1>Ajouter un nouveau locatier : </h1>


      <div class="row-3">
        <!-- INTITULE -->
        <div class="group-form">
          <label class="required" >Intitule </label>
          <input placeholder="intitulé" class="form" v-model="intitule" type="text" name="intitule" required >
        </div>
         <!-- <br /> -->

  
        <!-- COMMUNE -->
        <div class="group-form">
          <label class="required" >Commune </label>
          <input placeholder="commune" class="form" v-model="ville" type="text" name="ville" required >
        </div>
        <!-- <br /> -->

        <!-- ADRESSE -->
        <div class="group-form">
          <label class="required" >Adresse </label>
          <input placeholder="adresse" class="form" v-model="adresse" type="text" name="adresse" required >
        </div>
        <!-- <br /> -->

        <!-- CP -->
        <div class="group-form">
          <label class="required" >Code Postal </label>
          <input placeholder="code postal" class="form" v-model="codePostal" type="text" name="codePostal" required >
        </div>
        <!-- <br /> -->

        <!-- TEL -->
        <div class="group-form">
          <label class="required" >Téléphone </label>
          <input placeholder="téléphone" class="form" v-model="telephone" type="telephone" name="telephone" required >
        </div>
        <!-- <br /> -->

        <!-- SITE WEB -->
        <div class="group-form">
          <label>Site internet : </label>
          <input class="form" v-model="siteInternet" type="siteInternet" placeholder="https://www.fbrrenovation.fr" name="siteInternet">
        </div>
        <!-- <br /> -->

        <!-- MAIL -->
        <div class="group-form">
          <label>E-mail : </label>
          <input placeholder="email" class="form" v-model="email" type="email" name="email">
        </div>
        <!-- <br /> -->
      </div>
      <div class="row-2">
        <!-- NOTE PERSO -->
        <div class="group-form">
          <label>Note Personnelle : </label>
          <textarea class="form" v-model="notePerso" type="text" name="notePerso" ></textarea>
        </div>
      </div>
        <!-- <br /> -->
      
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
      telephone: null,
      siteInternet: null,
      email: null,
      notePerso: null
      
    };
  },
  methods: {
    async send() {
      let form = {
        intitule: this.intitule,
        ville: this.ville,
        adresse: this.adresse,
        codePostal: this.codePostal,
        telephone: this.telephone,
        siteInternet: this.siteInternet,
        email: this.email,
        notePerso: this.notePerso
        
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
      await fetch("/api/locatiers", myData)
        .then( async (response) => {
            if(response.status === 201){
                const data = await response.json();
                location.reload();
                console.log("Success:", data);
            }
        }
        )
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