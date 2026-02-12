<script setup>
  import Header from "@/Layouts/Header.vue";
  import Footer from "@/Layouts/Footer.vue";
  import Nav from "@/Layouts/Nav.vue";
  import Main from "@/Pages/Main.vue";

  const emit = defineEmits(['open-modal']);
</script>

<template>
  <Header @open-modal="emit('open-modal')"/>
  <Nav />
    <slot />
  <Footer />

</template>

<style scoped>

</style>