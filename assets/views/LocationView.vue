<template>
  <main>
    
    <form id="formulaire" @submit.prevent="send">
        <h1 class="titre" >Location : </h1>
        <label>Locatier : </label>
      <select v-model="locatier" type="text" name="locatier" >
          <option value="" disabled selected>Choisir un locatier...</option>
          <option v-for="loc in data1" :key="loc" :value="'/api/locatiers/'+loc.id" > {{ loc.intitule }} </option>
      </select>
        
        <label>Materiel : </label>
      <select v-model="materiel" type="text" name="materiel" >
          <option value="" disabled selected>Choisir un materiel...</option>
          <option v-for="mat in data2" :key="mat" :value="'/api/materiels/'+mat.id" > {{ mat.nomMateriel }} </option>
      </select>

        <label>Quantité* : </label>
        <input v-model="quantite" type="number" name="quantite" required ><br/>

        <label>Prix* : </label>
        <input v-model="prix" type="number" name="prix" required ><br/>

        <button type="submit">Ajouter</button>
    </form>
     
     
  </main>
</template>

<script>
export default {
    data() {

    return {
      locatier: "",
      materiel: "",
      quantite: null,
      prix: null,
      data1: "",
      data2: ""
    };
  },
  methods: {
    async getLocatiers() {
      const headers = new Headers({
        "Content-Type": "application/json",
        Accept: "application/json",
      });
      let getData1 = {
        method: "GET",
        headers: headers,
        mode: "cors",
        cache: "default",
      };
      await fetch("/api/locatiers", getData1)
        .then(async (response) => {
          if (response.status === 200) {
            this.data1 = await response.json();
            console.log("Success:", this.data1);
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
    async getMateriels() {
      const headers = new Headers({
        "Content-Type": "application/json",
        Accept: "application/json",
      });
      let getData2 = {
        method: "GET",
        headers: headers,
        mode: "cors",
        cache: "default",
      };
      await fetch("/api/materiels", getData2)
        .then(async (response) => {
          if (response.status === 200) {
            this.data2 = await response.json();
            console.log("Success:", this.data2);
            
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
    async send() {
      let form = {
        locatier: this.locatier,
        materiel: this.materiel,
        quantite: this.quantite,
        prix: this.prix,
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
      await fetch("/api/locations", myData)
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
    this.getLocatiers();
    this.getMateriels();
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
input, select  {
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