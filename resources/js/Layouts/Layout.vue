<script setup>
  import Header from "@/Layouts/Header.vue";
  import Footer from "@/Layouts/Footer.vue";
  import Nav from "@/Layouts/Nav.vue";

  const emit = defineEmits(['open-login', 'open-register']);
</script>

<template>
  <div class="min-h-screen flex flex-col bg-base-100">
    <Header @open-login="emit('open-login')" @open-register="emit('open-register')" />
    <Nav />
    
    <main class="flex-grow flex flex-col">
      <slot />
    </main>
    
    <Footer />
  </div>
</template>

<style scoped>
</style>