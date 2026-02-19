<script setup>
import Layout from "@/Layouts/Layout.vue";
import SupplierForm from "@/Components/SupplierForm.vue";

const props = defineProps({ supplier: Object });
</script>

<template>
    <Layout>
        <SupplierForm :supplier="props.supplier" />
    </Layout>
</template>
