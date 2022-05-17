<template>
  <main>TEST</main>
</template>

<script>
export default {
  async mounted() {
    const headers = new Headers({
      "Content-Type": "application/json",
      Accept: "application/json",
    });
    let myInit = {
      method: "GET",
      headers: headers,
      mode: "cors",
      cache: "default",
    };
    const response = await fetch("/api/users", myInit);
    const data = await response.json();
    this.obj = data;
    console.log(data);
  },
};
</script>
