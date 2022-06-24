<template>
    <div>
        <ClientListChantiers :idClient="this.idClient" :clientDataChantier="this.clientDataChantier"/>
        <ClientListDepannages :idClient="this.idClient" :clientDataDepannage="this.clientDataDepannage"/>
    </div>
</template>

<script>
import ClientListChantiers from './ClientListChantiers.vue'
import ClientListDepannages from './ClientListDepannages.vue'
export default {
    props: ["clientDataChantier","clientDataDepannage","idClient"],
  components: {
    ClientListChantiers,
    ClientListDepannages
  }
};
</script>