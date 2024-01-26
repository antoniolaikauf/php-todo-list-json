<script>
export default {
  new: "lista",
  // portato in questo file l'array con props
  props: {
    list: Object,
  },
};
</script>

<template>
  <!-- controllo se compito gia segnato o no -->
  <div v-if="list.done">{{ list.compito }}</div>

  <div v-else>
    <del>{{ list.compito }}</del>
  </div>
  <div class="btn-group" role="group" aria-label="Basic outlined example">
    <!-- bottone per eliminare il compito -->
    <button
      type="button"
      class="btn btn-outline-primary"
      @click="$emit('deletetasks')"
    >
      delete
    </button>
    <!-- bottone per cambiare la lista se fatta -->
    <button
      v-if="list.done"
      type="button"
      class="btn btn-outline-primary"
      @click="$emit('completata')"
    >
      completata
    </button>
  </div>
</template>

<style scoped lang="scss"></style>
