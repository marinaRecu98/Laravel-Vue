<script setup>
import Layout from "@/Layouts/Layout.vue";
import OrderForm from "@/Components/OrderForm.vue";

const props = defineProps({ order: Object });
</script>

<template>
    <Layout>
        <OrderForm :order="props.order" />
    </Layout>
</template>
