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
    deletecompito(index) {
      const params = {
        params: {
          index: index,
        },
      };
      axios
        .get("http://localhost/php-todo-list-json/php/deletetasks.php", params)
        .then((risposta) => {
          this.array_lista = risposta.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
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
        })
        .catch((error) => {
          console.error(error);
        });
    },
    changeStatus(index) {
      const params = {
        params: {
          index: index,
        },
      };
      axios
        .get("http://localhost/php-todo-list-json/php/changeStatus.php", params)
        .then((risposta) => {
          this.array_lista = risposta.data;
        })
        .catch((error) => {
          console.error(error);
        });
      console.log(index);
    },
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
      <h1 v-if="!array_lista.length" class="text-center">
        non ci sono compiti
      </h1>
      <h1 v-else class="text-center">
        compiti della lista {{ array_lista.length }}
      </h1>
      <div>
        <input type="text" v-model="compitoDaAggiungere" />
      </div>
      <button style="width: 200px" @click="aggiungielemento">aggiungi</button>
      <ul>
        <li v-for="(lista, i) in array_lista">
          <lista
            :list="lista"
            @deletetasks="deletecompito(i)"
            @completata="changeStatus(i)"
          />
        </li>
      </ul>
    </div>
  </div>
</template>

<style lang="scss">
@use "./style/general.scss";
</style>
