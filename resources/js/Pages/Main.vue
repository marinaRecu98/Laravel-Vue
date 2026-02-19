<script setup>
import Layout from "@/Layouts/Layout.vue";
import { usePage, Link } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import Modal from "@/Components/Modal.vue";
import LoginForm from "@/Components/LoginForm.vue";
import RegisterForm from "@/Components/RegisterForm.vue";

const user = computed(() => usePage().props.auth.user);

const showLogin = ref(false);
const showRegister = ref(false);
</script>

<template>
  <Layout @open-login="showLogin = true" @open-register="showRegister = true">
    <div class="flex-grow flex flex-col">
      <div class="hero flex-grow rounded-none overflow-hidden" style="background-image: url('/img/hero-bg.jpg'); background-size: cover; background-position: center;">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-white">
          <div class="max-w-md">
            <h1 class="text-5xl font-bold">Bake.App</h1>
            <p class="py-6">
              Bienvenido a la plataforma de gestión de proyectos. Organiza, sigue y colabora en tus tareas de forma eficiente.
            </p>
            <template v-if="!user">
              <button @click="showLogin = true" class="btn bg-orange-600 hover:bg-orange-700 text-white border-none">Comenzar ahora</button>
            </template>
            <template v-else>
              <Link :href="route('projects.index')" class="btn bg-orange-600 hover:bg-orange-700 text-white border-none">Ir a mis proyectos</Link>
            </template>
          </div>
        </div>
      </div>
    </div>

    <!-- Auth Modals -->
    <Modal :show="showLogin" @close="showLogin = false" maxWidth="md">
        <LoginForm @close="showLogin = false" />
    </Modal>

    <Modal :show="showRegister" @close="showRegister = false" maxWidth="md">
        <RegisterForm @close="showRegister = false" />
    </Modal>
  </Layout>
</template>

<style scoped>
</style>