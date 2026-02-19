<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const user = computed(() => usePage().props.auth.user);
</script>

<template>
  <div class="bg-base-200 border-b border-base-300">
    <div class="container mx-auto">
      <div class="tabs tabs-boxed bg-transparent p-2">
        <Link 
          v-if="user" 
          :href="route('projects.index')" 
          class="tab" 
          :class="{ 'tab-active bg-orange-500 text-white': $page.component.startsWith('Projects/') }"
        >
          Proyectos
        </Link>
      </div>
    </div>
  </div>
</template>

<style scoped>
</style>