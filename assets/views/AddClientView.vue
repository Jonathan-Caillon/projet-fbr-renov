<template>
  <main>
    
     <form id="formulaire" @submit.prevent="send">
      <label>Nom : </label>

      <input v-model="nom" type="text" name="nom" required ><br />
    
      <label>Prénom: </label>
      <input v-model="prenom" type="text" name="prenom" required ><br />
      
      <label>Ville: </label>
      <input v-model="ville" type="text" name="ville" required ><br />

      <label>Adresse: </label>
      <input v-model="adresse" type="text" name="adresse" required ><br />

      <label>Code Postal: </label>
      <input v-model="codePostal" type="text" name="codePostal" required ><br />

      <label>Téléphone: </label>
      <input v-model="telephone" type="telephone" name="telephone" required ><br />

      <label>E-mail: </label>
      <input v-model="mail" type="email" name="email"><br />

      <label>Raison sociale: </label>
      <input v-model="raisonSociale" type="text" name="raisonSociale" ><br />
      
      <button type="submit">Envoyer</button>

        <!-- <a :href="'/addChantier/' +dataId">Créer un chantier</a> -->
      
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
      dataId:"",
    };
  },
  methods: {
    async send() {
      let urgentForm = false;
      if (this.urgent == "true") {
        urgentForm = true;
      }  
      let form = {
        nom: this.nom,
        prenom: this.prenom,
        ville: this.ville,
        adresse: this.adresse,
        codePostal: this.codePostal,
        telephone: this.telephone,
        email: this.mail,
        raisonSociale: this.raisonSociale
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
      await fetch("/api/clients", myData)
        .then( async (response) => {
            if(response.status === 201){
                const data = await response.json();
                console.log("Success:", data);
                // console.log(data.id)
                // this.dataId = data.id
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

<style>

</style>