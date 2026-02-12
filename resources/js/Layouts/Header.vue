
<script setup>
  import {defineEmits} from 'vue';



  const emit = defineEmits(['open-modal']);
</script>

<template>

  <button class="btn tbn-primary" @click="emit('open-modal')">
    Login
  </button>

  <button class="btn tbn-primary" @click="emit('open-modal')">
    Registrar
  </button>

</template>

<style scoped>

</style>