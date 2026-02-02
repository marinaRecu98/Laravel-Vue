<script setup>
  import Header from "@/Layouts/Header.vue";
  import Footer from "@/Layouts/Footer.vue";
  import Nav from "@/Layouts/Nav.vue";
  import Main from "@/Pages/Main.vue";
</script>

<template>
  <Header />
  <Nav />
    <slot />
  <Footer />

</template>

<style scoped>

</style>