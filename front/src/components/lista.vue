<script>
export default {
  new: "lista",
  props: {
    list: Object,
  },
};
</script>

<template>
  <div v-if="list.done">{{ list.compito }}</div>

  <div v-else>
    <del>{{ list.compito }}</del>
  </div>
  <div class="btn-group" role="group" aria-label="Basic outlined example">
    <button
      type="button"
      class="btn btn-outline-primary"
      @click="$emit('deletetasks')"
    >
      delete
    </button>
  </div>
</template>

<style scoped lang="scss"></style>
