<template>
  <main> 
    <form id="formulaire" @submit.prevent="send">
        <h1>Ajouter un nouveau matériel : </h1>


        <div class="row-3">
        <!-- MATERIEL -->
          <div class="group-form">
            <label class="required" >Matériel </label>
            <input placeholder="matériel" class="form" v-model="nomMateriel" type="text" name="nomMateriel" required >
            <!-- <br /> -->
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
        nomMateriel: null
    
    }
    },

    methods: {
    async send() {
      let form = {
        nomMateriel: this.nomMateriel 
      };

      console.log(form)

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
      await fetch("/api/materiels", myData)
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
}
</script>

<style scoped>
 @import "@/styles/Form.css";

</style>