<script setup>
import { Link, usePage, router } from '@inertiajs/vue3';
import { computed } from 'vue';

const user = computed(() => usePage().props.auth.user);
const isHome = computed(() => usePage().component === 'Main');

const emit = defineEmits(['open-login', 'open-register']);

const logout = () => {
  router.post(route('logout'));
};
</script>

<template>
  <header class="bg-orange-600 text-white p-4 shadow-lg flex justify-between items-center">
    <Link :href="route('home')" class="text-2xl font-bold tracking-tighter">
      Bake.App
    </Link>
    
    <div class="flex gap-4 items-center">
      <template v-if="!user">
        <button v-if="isHome" @click="emit('open-login')" class="btn btn-ghost btn-sm">
          Login
        </button>
        <Link v-else :href="route('login')" class="btn btn-ghost btn-sm">
          Login
        </Link>
        
        <button v-if="isHome" @click="emit('open-register')" class="btn bg-gray-700 hover:bg-gray-800 text-white border-none btn-sm">
          Registrar
        </button>
        <Link v-else :href="route('register')" class="btn bg-gray-700 hover:bg-gray-800 text-white border-none btn-sm">
          Registrar
        </Link>
      </template>
      <template v-else>
        <span class="text-sm opacity-90 hidden sm:inline">
          Bienvenido, <strong>{{ user.name }}</strong>
        </span>
        <button @click="logout" class="btn btn-outline btn-accent btn-sm">
          Cerrar Sesión
        </button>
      </template>
    </div>
  </header>
</template>