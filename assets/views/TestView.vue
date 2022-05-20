<template>
  <main>
    <form id="formulaire" method="post" action="/api/users">
      <label
        >Email :
        <input name="email" />
      </label>
      <label
        >Password :
        <input name="password" />
      </label>
      <button type="submit">Sauvegarder</button>
    </form>
    <div id="decoded"></div>
  </main>
</template>

<script>
export default {
  async mounted() {
    // const headers = new Headers({
    //   "Content-Type": "application/json",
    //   Accept: "application/json",
    // });
    // let myInit = {
    //   method: "GET",
    //   headers: headers,
    //   mode: "cors",
    //   cache: "default",
    // };
    // const response = await fetch("/api/users", myInit);
    // const data = await response.json();
    // this.obj = data;
    // console.log(data);

    formulaire.onsubmit = async (e) => {
      e.preventDefault();
      var form = document.querySelector("#formulaire");
      // var form = document.forms[0];

      let data = {
        email: form.querySelector('input[name="email"]').value,
        password: form.querySelector('input[name="password"]').value,
      };

      let response = await fetch("/api/users", {
        method: "POST", // or 'PUT'
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      });

      let text = await response.text(); // read response body as text
      document.querySelector("#decoded").innerHTML = text;
    };
  },
};
</script>
