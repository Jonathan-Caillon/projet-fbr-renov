<template>
  <main>
    <div class="tableau">
      <div class="tableau-title">
        <div>
          <h3>Clients</h3>
        </div>
        <div>
          <router-link class="add" title="Ajouter un client" to="/add-client">
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
            Ajouter</router-link
          >
        </div>
      </div>
      <div class="tableau-content">
        <table>
          <thead>
            <tr>
              <th>Actions</th>
              <th>Id</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Ville</th>
              <th>Adresse</th>
              <th>Code postal</th>
              <th>Téléphone</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in data" :key="item">
              <td>
                <div class="tableau-actions">
                  <router-link
                    title="Voir page client"
                    v-bind:to="'/list-client/' + item.id"
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
                  <button
                    v-on:click="deleteClient(item.id)"
                    title="Supprimer client"
                    class="delete"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                    >
                      <path
                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                        fill="currentColor"
                      ></path>
                      <path
                        opacity="0.5"
                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                        fill="currentColor"
                      ></path>
                      <path
                        opacity="0.5"
                        d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                        fill="currentColor"
                      ></path>
                    </svg>
                  </button>
                </div>
              </td>
              <td>{{ item.id }}</td>
              <td>{{ item.nom }}</td>
              <td>{{ item.prenom }}</td>
              <td>{{ item.ville }}</td>
              <td>{{ item.adresse }}</td>
              <td>{{ item.codePostal }}</td>
              <td>{{ item.telephone }}</td>
              <td>{{ item.email }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="tableau-footer">
        <div class="pagination">
          <button v-if="previous" v-on:click="getClient(previous)">
            &laquo;
          </button>
          <button
            v-for="(page, index) in pages"
            :key="page"
            v-on:click="getClient(index + 1)"
            v-bind:class="{ active: current == index + 1 }"
          >
            {{ index + 1 }}
          </button>
          <button v-if="next" v-on:click="getClient(next)">&raquo;</button>
        </div>
      </div>
    </div>
  </main>
</template>

<style lang="scss" scoped>
@import "@/styles/viewList.scss";
</style>

<script>
export default {
  data() {
    return {
      previous: null,
      next: null,
      pages: null,
      data: null,
      current: null,
    };
  },
  methods: {
    async getClient(params) {
      const headers = new Headers({
        "Content-Type": "application/ld+json",
        Accept: "application/ld+json",
      });
      let getData = {
        method: "GET",
        headers: headers,
        mode: "cors",
        cache: "default",
      };
      await fetch(`/api/clients?page=${params}`, getData)
        .then(async (response) => {
          if (response.status === 200) {
            let data = await response.json();
            console.log("Success:", data);
            this.current = params;
            this.data = data["hydra:member"];
            let page = data["hydra:totalItems"];
            this.pages = Math.ceil(page / 5);
            let previous = data["hydra:view"]["hydra:previous"] || null;
            let next = data["hydra:view"]["hydra:next"] || null;
            if (previous !== null) {
              let previousSlice = previous.slice(12);
              let previousParams = new URLSearchParams(previousSlice);
              this.previous = previousParams.get("page");
            } else {
              this.previous = null;
            }
            if (next !== null) {
              let nextSlice = next.slice(12);
              let nextParams = new URLSearchParams(nextSlice);
              this.next = nextParams.get("page");
            } else {
              this.next = null;
            }
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },

    async deleteClient(id) {
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
      await fetch("/api/clients/" + id, deletetData)
        .then(async (response) => {
          if (response.status === 204) {
            console.log("Success");
            this.getClient(this.current);
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
  },
  mounted() {
    this.getClient(1);
  },
};
</script>
