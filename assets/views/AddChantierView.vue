<template>
  <main>
     <form id="formulaire" @submit.prevent="send">
      <label>Intitulé : </label>
      <input v-model="intitule" type="text" name="intitule" required /><br />

      <label>Adresse: </label>
      <input v-model="adresse" type="text" name="adresse" required /><br />

      <label>Ville: </label>
      <input v-model="ville" type="text" name="ville" required /><br />

      <label>Code Postal: </label>
      <input v-model="codePostal" type="text" name="codePostal" required /><br />

      <label>Date de creation: </label>
      <input v-model="date" type="date" name="date" required /><br />

      <label>Durée de Travaux: </label>
      <input v-model="dureeTravaux" type="number" name="dureeTravaux" required /><br />

      <label>Travaux supplémentaire: </label>
      <input v-model="travauxSupl" type="number" name="travauxSupl" /><br />

      <label>Distance: </label>
      <input v-model="distance" type="number" name="distance" required /><br />

      <label>Note Personnelle: </label>
      <textarea v-model="notePerso" type="text" name="notePerso"></textarea><br />

      <label>Note Client: </label>
      <textarea v-model="noteClient" type="text" name="noteClient" ></textarea><br />

      <label>Urgent: </label>
      <input v-model="urgent" type="radio" name="urgent" value="false" checked/>
      <label>Non </label>

      <input v-model="urgent" type="radio" name="urgent" value="true" />
      <label>Oui </label> <br />

      <label>Type Chantier: </label>
      <input v-model="typeChantier" type="radio" name="typeChantier" value="interieur"/>
      <label>Intérieur</label>

      <input v-model="typeChantier" type="radio" name="typeChantier" value="exterieur"/>
      <label>Extérieur </label>

      <button type="submit">Envoyer</button>
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
      typeChantier: null,
    };
  },
  methods: {
    async send() {
      let urgentForm = false;
      if (this.urgent == "true") {
        urgentForm = true;
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
        typeChantier: this.typeChantier,

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
        .then( async (response) => {
            if(response.status === 200){
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
};
</script>

<style>

@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500;600;700&family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap');

body {
   max-height: 100vh;
   width: 100vw;
   overflow: hidden;
   font-family: 'Poppins', sans-serif;
}
form{
  padding: 0 25% 0 25%;
}

</style>