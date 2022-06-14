<template>
  <main>
    <div class="card-login">
      <h1>FBR rénovation immobilière</h1>
      <form @submit.prevent="sendUser">
        <div class="row">
          <label for="email">Email</label>
          <input id="email" v-model="email" type="email" required />
        </div>

        <div class="row">
          <label for="password">Password</label>
          <input id="password" v-model="password" type="password" required />
        </div>

        <button type="submit">Se connecter</button>
      </form>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      email: null,
      password: null,
    };
  },
  methods: {
    async sendUser() {
      let form = {
        email: this.email,
        password: this.password,
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
      await fetch("/api/login", myData)
        .then(async (response) => {
          if (response.status === 200) {
            const data = await response.json();
            const token = data.token;
            window.localStorage.setItem("access_token", token);
            console.log(token);
            this.$router.push("/list-clients");
          }
        })
        .catch((error) => {
          console.error("Invalid user:", error);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.card-login {
  padding: 3.75rem;
  margin: auto;
  width: 500px;
  box-shadow: 0 0.1rem 1rem 0.25rem rgb(0 0 0 / 5%);
  border-radius: 0.475rem;
  & h1 {
    text-align: center;
    margin-bottom: 2.5rem;
  }
  & form {
    width: 100%;
    & input {
      background-color: #f5f8fa;
      border-color: #f5f8fa;
      color: #5e6278;
      transition: color 0.2s ease, background-color 0.2s ease;
      width: 100%;
      border: none;
      padding: 0.825rem 1.5rem;
      border-radius: 0.475rem;
      appearance: none;
      box-shadow: none;
    }
    & input:active {
      background-color: #eef3f7;
      border-color: #eef3f7;
    }
    & button {
      background-color: #009ef7;
      color: #ffffff;
      border: 0;
      box-shadow: none;
      padding: calc(0.825rem + 1px) calc(1.75rem + 1px);
      width: 100%;
      font-size: 1.15rem;
      border-radius: 0.475rem;
    }
    & button[type="submit"] {
      cursor: pointer;
    }
    & button:hover {
      background-color: #0095e8;
    }
    & label {
      font-weight: bold;
    }
  }
  & .row {
    margin-bottom: 2.5rem;
  }
}
@media (max-width: 992px) {
  .card {
    width: 100%;
  }
}
</style>
