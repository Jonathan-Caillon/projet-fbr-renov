<template>
  <main>
    <div class="tableau">
      <div class="tableau-title">
        <div>
          <h3>Profil Client {{ id }}</h3>
        </div>
        <div>
          <router-link class="add" title="Editer un client" to="/add-client">
            <span
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
              >
                <rect
                  opacity="0.3"
                  x="2"
                  y="2"
                  width="20"
                  height="20"
                  rx="5"
                  fill="currentColor"
                ></rect>
                <rect
                  x="10.8891"
                  y="17.8033"
                  width="12"
                  height="2"
                  rx="1"
                  transform="rotate(-90 10.8891 17.8033)"
                  fill="currentColor"
                ></rect>
                <rect
                  x="6.01041"
                  y="10.9247"
                  width="12"
                  height="2"
                  rx="1"
                  fill="currentColor"
                ></rect>
              </svg>
            </span>
            Editer</router-link
          >
        </div>
      </div>
      <div class="tableau-content">
        <div class="row">
          <div class="label">Nom</div>
          <div class="info">{{ this.nom }}</div>
        </div>
        <div class="row">
          <div class="label">Prénom</div>
          <div class="info">{{ this.prenom }}</div>
        </div>
        <div class="row">
          <div class="label">Adresse</div>
          <div class="info">{{ this.adresse }}</div>
        </div>
        <div class="row">
          <div class="label">Commune</div>
          <div class="info">{{ this.ville }}</div>
        </div>
        <div class="row">
          <div class="label">Code Postal</div>
          <div class="info">{{ this.codePostal }}</div>
        </div>
        <div class="row">
          <div class="label">Téléphone</div>
          <div class="info">{{ this.telephone }}</div>
        </div>
        <div class="row">
          <div class="label">Email</div>
          <div class="info">{{ this.email }}</div>
        </div>
        <div class="row">
          <div class="label">Raison Social</div>
          <div class="info">{{ this.raison }}</div>
        </div>
      </div>
    </div>
  </main>
</template>

<style lang="scss" scoped>
@import "@/styles/clientProfile.scss";
</style>

<script>
export default {
  props: ["id"],
  data() {
    return {
      data: null,
      nom: null,
      prenom: null,
      commune: null,
      adresse: null,
      codePostal: null,
      telephone: null,
      email: null,
      raison: null,
    };
  },
  methods: {
    async getClient(id) {
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
      await fetch(`/api/clients/${id}`, getData)
        .then(async (response) => {
          if (response.status === 200) {
            let data = await response.json();
            console.log("Success:", data);
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
  },
  mounted() {
    this.getClient(this.id);
  },
};
</script>
