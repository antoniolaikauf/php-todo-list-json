<script>
import axios from "axios";
export default {
  new: "lista",
  data() {
    return {
      array_lista: [],
    };
  },

  mounted() {
    const t = this;
    axios.get("http://localhost/php-todo-list-json/php/").then((risposta) => {
      t.array_lista = risposta.data;
      console.log(risposta.data);
    });
  },
};
</script>

<template>
  <div class="container">
    <div class="row">
      <h1 class="text-center">compiti della lista {{ array_lista.length }}</h1>
      <p>
        in rosso i compiti che non hai completato <br />in verde i compiti che
        hai completato
      </p>

      <ul>
        <li v-for="(compiti, i) in array_lista" :key="i">
          <div :class="compiti.done ? 'done ' : 'no_done '" class="my-3">
            {{ compiti.compito }}
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<style scoped lang="scss">
.done {
  background-color: green;
}

.no_done {
  background-color: red;
}
</style>
