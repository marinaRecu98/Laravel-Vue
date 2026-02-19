<script setup>
import Layout from "@/Layouts/Layout.vue";
import WorkerForm from "@/Components/WorkerForm.vue";

const props = defineProps({ worker: Object });
</script>

<template>
    <Layout>
        <WorkerForm :worker="props.worker" />
    </Layout>
</template>
