<template>
  <main>
    <section>
      <div class="tableau">
        <div class="tableau-title">
          <div>
            <h3>Locatiers</h3>
          </div>
          <div>
            <router-link
              title="Ajouter un locatier"
              class="add"
              to="/add-locatier"
            >
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
                <th>Intitule</th>
                <th>Commune</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Site internete</th>
                <th>E-mail</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="item in data"
                :key="item"
              >
                <td>
                  <div class="tableau-actions">
                    <router-link
                      title="Voir page chantier"
                      v-bind:to="'/list-locatiers/' + item.id"
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
                <td>{{ item.intitule }}</td>
                <td>{{ item.ville }}</td>
                <td>{{ item.adresse }}</td>
                <td>{{ item.codePostal }}</td>
                <td>{{ item.telephone }}</td>
                <td>{{ item.siteInternet }}</td>
                <td>{{ item.mail }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
</template>

<style lang="scss" scoped>
@import "@/styles/viewList.scss";
</style>

<script>
export default {
  data() {
    return {
      data: null,
    };
  },
  methods: {
    async getLocatier() {
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
      await fetch("/api/locatiers", getData)
        .then(async (response) => {
          if (response.status === 200) {
            this.data = await response.json();
            console.log("Success:", this.data);
        

          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },

    async deleteLocatier(id) {
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
      await fetch("/api/locatiers/" + id, deletetData)
        .then(async (response) => {
          if (response.status === 204) {
            console.log("Success");
            this.getChantier();
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
  },
  mounted() {
    this.getLocatier();
  },
};
</script>
