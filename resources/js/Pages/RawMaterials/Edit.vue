<script setup>
import Layout from "@/Layouts/Layout.vue";
import RawMaterialForm from "@/Components/RawMaterialForm.vue";

const props = defineProps({ material: Object });
</script>

<template>
    <Layout>
        <RawMaterialForm :material="props.material" />
    </Layout>
</template>
