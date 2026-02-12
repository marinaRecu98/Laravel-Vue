<script setup>

import Layout from "@/Layouts/Layout.vue";
import {usePage, Link} from "@inertiajs/vue3";
import {computed, ref} from "vue";

const user = computed(()=>usePage().props.auth.user);

const showLogin = ref(false);

</script>

<template>
  <Layout @open-modal='showLogin=true'>
    <div v-if="user">

    </div>

    <div v-else
        class="hero min-h-screen"
        style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);"
    >
      <div class="hero-overlay"></div>
      <div class="hero-content text-neutral-content text-center">
        <div class="max-w-md">
          <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
          <p class="mb-5">
            Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
            quasi. In deleniti eaque aut repudiandae et a id nisi.
          </p>
          <button class="btn btn-primary">Get Started</button>
        </div>
      </div>
    </div>

    <Modal :show="showLogin">
      <Login/>
    </Modal>

  </Layout>

</template>

<style scoped>

</style>