<template>
  <main>
    <section>
      <div class="tableau-client">
        <div class="tableau-title">
          <div>
            <h3>Chantier</h3>
          </div>
          <div class="btn-actions">
            <router-link
              title="Editer un client"
              v-bind:to="'/edit-client/' + idChantier"
              ><button class="add">
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
                Editer
              </button>
            </router-link>
            <button
              class="delete"
              v-on:click="deleteChantier(idChantier)"
              title="Supprimer chantier"
            >
              Supprimer
            </button>
          </div>
        </div>
        <div class="tableau-content">
          <div class="row">
            <div class="label">Intitulé</div>
            <div class="info">{{ this.intitule }}</div>
          </div>
          <div class="row">
            <div class="label">Adresse</div>
            <div class="info">{{ this.adresse }}</div>
          </div>
          <div class="row">
            <div class="label">Commune</div>
            <div class="info">{{ this.commune }}</div>
          </div>
          <div class="row">
            <div class="label">Code Postal</div>
            <div class="info">{{ this.codePostal }}</div>
          </div>
          <div class="row">
            <div class="label">Type</div>
            <div class="info">{{ this.typeChantier }}</div>
          </div>
          <div class="row">
            <div class="label">Date de création :</div>
            <div class="info">{{ this.date }}</div>
          </div>
          <div class="row">
            <div class="label">Date dernière Modifications :</div>
            <div class="info">{{ this.dateModif }}</div>
          </div>
          <div class="row">
            <div class="label">Notes personnelles :</div>
            <div class="info">{{ this.notePerso }}</div>
          </div>
          <div class="row">
            <div class="label">Notes client :</div>
            <div class="info">{{ this.noteClient }}</div>
          </div>
          <div class="row">
            <div class="label">Distance Dépôt :</div>
            <div class="info">{{ this.distance }}km</div>
          </div>
          <div class="row">
            <div class="label">Nombre d’heures :</div>
            <div class="info">{{ this.dureeTravaux }}h</div>
          </div>
          <div class="row">
            <div class="label">Travaux Supplémentaires :</div>
            <div class="info">{{ this.travauxSupl }}€</div>
          </div>
          <div class="row">
            <div class="label">Urgent :</div>
            <div v-if="this.urgent" class="info">Oui</div>
            <div v-else class="info">Non</div>
          </div>
        </div>
        <div class="tableau-title">
          <div>
            <h3>Devis</h3>
          </div>
          <div class="btn-actions">
            <router-link
              title="Editer un client"
              v-bind:to="'/list-clients/'+ idClient +'/chantier/' + idChantier + '/add-devis'"
              ><button class="add">
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
                Ajouter
              </button>
            </router-link>
          </div>
        </div>
        <div class="tableau-list">
          <table>
            <thead>
              <tr>
                <th>Edit</th>
                <th>Numéro</th>
                <th>Prix</th>
                <th>Acompte</th>
                <th>Intermédiaire</th>
                <th>Final</th>
                <th>Statut</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="item in devis"
                :key="item"
              >
                <td>
                  <div class="tableau-actions">
                    <router-link
                      title="Editer devis"
                      v-bind:to="'/list-chantiers/' + item.id"
                    >
                      <button class="link">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="currentColor"
                        >
                          <path
                            d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"
                          />
                        </svg>
                      </button>
                    </router-link>
                  </div>
                </td>
                <td>{{ item.numeroDevis }}</td>
                <td>{{ item.prixDevis }}€</td>
                <td>{{ item.paiementAcompte }}€</td>
                <td v-if="item.paiementIntermed">{{ item.paiementIntermed }}€</td>
                <td v-else>0€</td>
                <td>{{ this.devisFinal(item.prixDevis,item.paiementAcompte,item.paiementIntermed) }}€</td>
                <td class="uppercase">{{ item.statut }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
</template>

<style lang="scss" scoped>
@import "@/styles/clientProfile.scss";
@import "@/styles/viewList.scss";
</style>

<script>
export default {
  props: ["idChantier","idClient"],
  data() {
    return {
      data: null,
      intitule: null,
      prenom: null,
      commune: null,
      adresse: null,
      codePostal: null,
      typeChantier: null,
      travauxSupl: null,
      distance: null,
      dureeTravaux: null,
      chantier_data: null,
      date: null,
      dateModif: null,
      notePerso: null,
      noteClient: null,
      urgent: null,
      devis: null,
    };
  },
  methods: {
    async getChantier(idChantier) {
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
      try {
        let response = await fetch(`/api/chantiers/${idChantier}`, getData);
        if (response.status === 200) {
          let data = await response.json();
          console.log("Success:", data);
          this.intitule = data.intitule;
          this.commune = data.ville;
          this.adresse = data.adresse;
          this.codePostal = data.codePostal;
          this.typeChantier = data.typeChantier;
          this.travauxSupl = data.travauxSupl;
          this.distance = data.distance;
          this.dureeTravaux = data.dureeTravaux;
          this.notePerso = data.notePerso;
          this.noteClient = data.noteClient;
          this.urgent = data.urgent;
          this.devis = data.devis;
          this.date = this.formatDate(data.date);
          this.dateModif = this.formatDate(data.dateModif);
        }
        if (response.status === 404) {
          this.$router.push("/404");
        }
      } catch (err) {
        console.error(err);
      }
    },
    formatDate(value) {
      if (value) {
        let date = new Date(value);
        return date.toLocaleDateString();
      }
    },
    devisFinal(devis, acompte, inter) {
        let final = devis - acompte - inter;
        return final;
    },
    async deleteChantier(id) {
      const deleteHeaders = new Headers({
        "Content-Type": "application/json",
        Accept: "application/json",
      });
      let deletetData = {
        method: "DELETE",
        headers: deleteHeaders,
        mode: "cors",
        cache: "default",
      };
      try {
        let response = await fetch("/api/chantiers/" + id, deletetData);

        if (response.status === 204) {
          console.log("Success");
          this.$router.push("/list-clients");
        }
      } catch (error) {
        console.error("Error:", error);
      }
    },
  },
  mounted() {
    this.getChantier(this.idChantier);
  },
};
</script>
