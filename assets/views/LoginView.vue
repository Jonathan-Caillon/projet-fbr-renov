<template>
  <main>
    <div class="card">
      <h1>Se connecter</h1>
      <form id="formulaire">
        <div class="row"><label>Email : </label> <input name="email" /></div>

        <div class="row">
          <label>Password : </label> <input name="password" />
        </div>

        <button type="submit">Sauvegarder</button>
      </form>
    </div>
  </main>
</template>

<script>
export default {
  async mounted() {
    formulaire.onsubmit = async (e) => {
      e.preventDefault();
      var form = document.querySelector("#formulaire");

      let data = {
        email: form.querySelector('input[name="email"]').value,
        password: form.querySelector('input[name="password"]').value,
      };

      await fetch("/api/login", {
        method: "POST", // or 'PUT'
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      }).then(async (response) => {
        if (response.status === 200) {
          const data = await response.json();
          const token = data.token;
          window.localStorage.setItem("access_token", token);
          console.log(token);
        } else {
          console.log("Invalid user");
        }
      });
    };
  },
};
</script>

<style lang="scss">
.card {
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
  }
  & .row {
    margin-bottom: 2.5rem;
  }
}
</style>
