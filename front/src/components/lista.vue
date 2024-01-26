<script>
import axios from "axios";
export default {
  new: "lista",
  props: {
    list: Object,
  },
};
</script>

<template>
  <div class="container">
    <div class="row">
      <div v-if="list.done">{{ list.compito }}</div>

      <div v-else>
        <del>{{ list.compito }}</del>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss"></style>
