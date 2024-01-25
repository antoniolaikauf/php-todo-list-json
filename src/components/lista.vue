<script>
import axios from "axios";
export default {
  new: "lista",
  data() {
    return {
      // arrai dove ci saranno tutti i compiti
      array_lista: [],
      compitoDaAggiungere: "",
    };
  },
  methods: {
    // fnzione per aggiungere la tasks
    aggiungielemento() {
      this.array_lista.push({ compito: this.compitoDaAggiungere, done: true });
      this.compitoDaAggiungere = "";
    },
  },

  mounted() {
    const t = this;
    // chiamata ad api per il nostro server
    axios.get("http://localhost/php-todo-list-json/php/").then((risposta) => {
      t.array_lista = risposta.data;
      // console.log(risposta.data);
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
      <!-- aggiunta tasks -->
      <div>
        <input type="text" v-model="compitoDaAggiungere" />
      </div>
      <button style="width: 200px" @click="aggiungielemento">aggiungi</button>
      <ul>
        <!-- ciclo per comparsa componenti -->
        <li v-for="(compiti, i) in array_lista" :key="i">
          <div v-if="compiti.done">
            {{ compiti.compito }}
          </div>
          <div v-else>
            <del>{{ compiti.compito }}</del>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<style scoped lang="scss"></style>
