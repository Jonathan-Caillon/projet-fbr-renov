<template>
    <form id="formulaire" @submit.prevent="send">
        <h1 class="titre" >Ajouter un nouveau client : </h1>
        <label>Matériel* : </label>
        <input v-model="nom" type="text" name="nom" required ><br />

        <label>Prix* : </label>
        <input v-model="prix" type="text" name="prix" required ><br />
        
        <label>Quantité* : </label>
        <input v-model="ville" type="text" name="quantité" required ><br />

        <button type="submit">Envoyer</button>
    </form>
</template>

<script>
export default {

}
</script>

<style>

</style>