<template>
  <main>
    
     <form id="formulaire" @submit.prevent="send">
       <h1 class="titre" >Ajouter un depannage : </h1>
      <label>Intitulé* : </label>
      <input v-model="intitule" type="text" name="intitule" required ><br />

      <label>Numéro d'intervention* : </label>
      <input v-model="numeroIntervention" type="number" name="numeroIntervention" required ><br />

      <label>Ville* : </label>
      <input v-model="ville" type="text" name="ville" required ><br />

      <label>Adresse* : </label>
      <input v-model="adresse" type="text" name="adresse" required ><br />

      <label>Code Postal* : </label>
      <input v-model="codePostal" type="text" name="codePostal" required ><br />

       <label>Horaire* : </label>
      <select v-model="horaireDepannage" type="text" name="horaireDepannage" >
          <option>Jour</option>
          <option>Nuit</option>
          <option>Week-end</option>
      </select>

      <label>Prix* : </label>
      <input v-model="prixDepannage" type="number" step="0.01" name="prixDepannage"><br />

      <label>Distance* : </label>
      <input v-model="distance" type="number" step="0.01" name="distance" ><br />

      <label>Note Personnelle : </label>
      <textarea v-model="notePerso" type="text" name="notePerso" ></textarea><br />
      
      <button type="submit">Envoyer</button>

      
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
      horaireDepannage:"",
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
      await fetch("/api/depannages", myData)
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

input, select, textarea {
  background-color: #52575e; 
  border-radius: 5px;
  border: 1px solid rgb(139, 132, 132);
  padding-top: 1rem;
  padding-bottom: 1rem;
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
  cursor: pointer;
 
 
}

</style>