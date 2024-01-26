<script>
// impost del file lista
import lista from "./components/lista.vue";
import axios from "axios";

export default {
  components: {
    // componente lista
    lista,
  },
  data() {
    return {
      array_lista: [],
      compitoDaAggiungere: "",
    };
  },
  methods: {
    // fnzione per aggiungere la tasks
    aggiungielemento() {
      const params = {
        params: {
          compito: this.compitoDaAggiungere,
        },
      };
      axios
        .get("http://localhost/php-todo-list-json/php/getcompito.php", params)
        .then((risposta) => {
          this.array_lista = risposta.data;
          this.compitoDaAggiungere = "";
        });
    },
    // aggiungielemento() {
    //   const t = this;
    //   const params = {
    //     compito: this.compitoDaAggiungere,
    //   };
    //   const config = {
    //     headers: {
    //       "Content-Type": "multipart/form-data",
    //     },
    //   };

    //   axios
    //     .post("http://localhost/back-end/pushPost.php", params, config)
    //     .then((res) => {
    //       t.array_lista = res.data;
    //       t.compitoDaAggiungere = "";
    //     })
    //     .catch((err) => console.log(err));
    // },
  },
  mounted() {
    // chiamata ad api per il nostro server
    axios
      .get("http://localhost/php-todo-list-json/php/")
      .then((risposta) => {
        this.array_lista = risposta.data;
        // console.log(risposta.data);
      })
      .catch((error) => {
        console.error(error);
      });
  },
};
</script>

<template>
  <div class="container">
    <div class="row">
      <h1 class="text-center">compiti della lista {{ array_lista.length }}</h1>
      <div>
        <input type="text" v-model="compitoDaAggiungere" />
      </div>
      <button style="width: 200px" @click="aggiungielemento">aggiungi</button>
      <ul>
        <li v-for="(lista, i) in array_lista">
          <lista :list="lista" />
        </li>
      </ul>
    </div>
  </div>
</template>

<style lang="scss">
@use "./style/general.scss";
</style>
