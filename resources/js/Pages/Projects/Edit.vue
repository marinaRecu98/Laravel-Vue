<script setup>
import ProjectForm from "@/Components/ProjectForm.vue";

const props = defineProps({project:Object})

</script>

<template>
  <Layout>
    <ProjectForm :project="props.project"/>
  </Layout>

</template>

<style scoped>

</style>