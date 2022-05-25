<template>
  <main>

    
     <form id="formulaire" @submit.prevent="send">
       <h1 class="titre" >Ajouter un nouveau chantier: </h1>

      <label>Intitulé* : </label>
      <input v-model="intitule" type="text" name="intitule" required /><br />

      <label>Adresse* : </label>
      <input v-model="adresse" type="text" name="adresse" required /><br />

      <label>Ville* : </label>
      <input v-model="ville" type="text" name="ville" required /><br />

      <label>Code Postal: </label>
      <input
        v-model="codePostal"
        type="text"
        name="codePostal"
        required
      /><br />

      <label>Date de creation* : </label>
      <input v-model="date" type="date" name="date" required /><br />

      <label>Durée de Travaux: </label>
      <input
        v-model="dureeTravaux"
        type="number"
        name="dureeTravaux"
        required
      /><br />

      <label>Travaux supplémentaire: </label>
      <input v-model="travauxSupl" type="number" name="travauxSupl" /><br />

      <label>Distance* : </label>
      <input v-model="distance" type="number" name="distance" required /><br />

      <label>Note Personnelle: </label>
      <textarea v-model="notePerso" type="text" name="notePerso"></textarea
      ><br />

      <label>Note Client: </label>
      <textarea v-model="noteClient" type="text" name="noteClient"></textarea
      ><br />

<div>
      <label>Urgent: </label>
      <div>
        <input
          v-model="urgent"
          type="radio"
          name="urgent"
          value="false"
        />
        <label>Non </label>
      </div>
      <div>
      <input v-model="urgent" type="radio" name="urgent" value="true" />
      <label>Oui </label></div> <br />
    </div>
   <div>
      <label>Type Chantier: </label>
      <input
        v-model="typeChantier"
        type="radio"
        name="typeChantier"
        value="Intérieur"
        checked
      />
      <label>Intérieur</label>

      <input v-model="typeChantier" type="radio" name="typeChantier" value="exterieur"/>
      <label>Extérieur </label>
      </div>
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
        .then(async (response) => {
          if (response.status === 200) {
            const data = await response.json();
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

@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500;600;700&family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap');

body {
  
   background-color: #2c3338;
}

main {
  margin-bottom: 20px;
}

.titre {
  display: flex;
  color: #fff;
  font-size: 45px;
  padding:0;
  padding-bottom: 1.2rem;
  margin-bottom: 50px;
  border-bottom:  2px solid #fff

}

form {
    position: relative;
    margin: 4rem;
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    width: 80%;
    pointer-events: auto;
    border: 0 solid rgba(0,0,0,.2);
    border-radius: 0.475rem;
    /* box-shadow: 0 0.25rem 0.5rem rgb(0 0 0 / 10%); */
    outline: 0;
}

label {
  color: #fff;
  font-size: 20px;
}

input {
  background-color: #52575e; 
  border-radius: 5px;
  border: 1px solid rgb(139, 132, 132);
  padding-top: 1rem;
  padding-bottom: 1rem;
  color: #fff;
  font-family: 'Poppins', sans-serif;
}

textarea {
  background-color: #52575e; 
  border-radius: 5px;
  border: 1px solid rgb(139, 132, 132);
  padding-top: 2rem;
  padding-bottom: 2rem;
  color: #fff;
  font-family: 'Poppins', sans-serif;

}

button {
  margin: 20px 0 40px 0;
  width: 250px;
  padding: 10px;
  font-family: 'Poppins', sans-serif;
  background-color: #009ef7;
  color: #fff;
  border: none;
  border-radius: 5px;
 
 
}



</style>
