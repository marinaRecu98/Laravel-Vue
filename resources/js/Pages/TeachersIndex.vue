<script setup>
import Layout from "@/Layouts/Layout.vue";
const props = defineProps({rows:Array, fields:Object})
</script>

<template>
<Layout>
  <Table :rows="rows" :fields="fields" :model="model"/>
</Layout>
</template>

<style scoped>

</style>