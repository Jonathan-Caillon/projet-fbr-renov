<template>
  <main>
    <div class="tableau">
      <div class="tableau-title">
        <div>
          <h3>Clients</h3>
        </div>
        <div>
          <a title="Ajouter un client" class="add" href="/add-client">
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
            Ajouter</a
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
          <tbody v-for="item in data" :key="item">
            <tr>
              <td>
                <div class="tableau-actions">
                  <a
                    v-bind:title="'Voir page client ' + item.id"
                    v-bind:href="'/client/' + item.id"
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
                  </a>
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
              <td>Non</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</template>

<style lang="scss" scoped>
.tableau {
  padding: 2.25rem 2rem;
  font-family: "Poppins", sans-serif;
  box-shadow: 0px 0px 20px 0px rgb(76 87 125 / 2%);
  background-color: #ffffff;
  margin: 3.75rem;
  & .tableau-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    & .add {
      padding: calc(0.4rem + 1px) calc(1rem + 1px);
      color: #009ef7;
      background-color: #f1faff;
      font-size: 0.8rem;
      font-weight: 500;
      border-radius: 0.325rem;
      text-decoration: none;
      display: inline-flex;
      text-align: center;
      align-items: center;
      line-height: 1.5;
      transition: 0.15s ease;
      & span {
        line-height: 0;
        margin-right: 0.5rem;
        & svg {
          height: 1.1rem;
          width: 1.1rem;
        }
      }
    }
    & .add:hover {
      color: #ffffff;
      background-color: #009ef7;
    }
  }
  & .tableau-content {
    overflow: scroll visible;
    scrollbar-width: thin;
    scrollbar-color: #ccd5e5;

    & table {
      border-radius: 0.625rem;
      position: relative;
      width: 100%;
      & thead {
        & th {
          color: #b5b5c3;
          text-align: start;
          padding: 1.25rem 0.75rem;
          font-size: 0.8rem;
          text-transform: uppercase;
          border-bottom-width: 1px;
          border-bottom-style: dashed;
          border-bottom-color: #eff2f5;
        }
      }
      & tbody {
        & tr {
          & td {
            font-size: 0.875rem;
            padding: 1rem 0.625rem;
            border-bottom-width: 1px;
            border-bottom-style: dashed;
            border-bottom-color: #eff2f5;
            & .tableau-actions {
              display: flex;
              & button {
                font-family: "Poppins", sans-serif;
                color: #7e8299;
                border: none;
                background-color: #f5f8fa;
                padding: calc(0.6rem + 1px);
                border-radius: 0.325rem;
                display: inline-flex;
                cursor: pointer;
                text-align: center;
                align-items: center;
                margin-inline-end: 4px;
                & svg {
                  height: 1.25rem;
                  width: 1.25rem;
                }
              }
              & button:hover {
                color: #009ef7;
                background-color: #f1faff;
              }
              & button:focus {
                color: #009ef7;
                background-color: #f1faff;
              }
              & button.delete:hover {
                color: #f1416c;
                background-color: #f1faff;
              }
              & button.delete:focus {
                color: #f1416c;
                background-color: #f1faff;
              }
            }
          }
          & td:first-child {
            padding-left: 0;
          }
        }
      }
    }
  }
  & .tableau-content::-webkit-scrollbar {
    width: 0.4rem;
    height: 0.4rem;
  }
  & .tableau-content::-webkit-scrollbar-thumb {
    background-color: #ccd5e5;
  }
  & .tableau-actions {
    display: flex;
  }
}
</style>

<script>
export default {
  data() {
    return {
      data: null,
    };
  },
  methods: {
    async getClient() {
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
      await fetch("/api/clients", getData)
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

    async deleteClient(id) {
      console.log(id);
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
            this.getClient();
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
  },
  mounted() {
    this.getClient();
  },
};
</script>
