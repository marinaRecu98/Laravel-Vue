<script setup>
import { router } from "@inertiajs/vue3";
import Layout from "@/Layouts/Layout.vue";
import { ref, computed } from 'vue';

const props = defineProps({ fields: Object, rows: Array, model: Object });

const ascendente = ref(false);
const fieldOrder = ref(Object.keys(props.fields)[0]);

const rowsOrdered = computed(() => {
    return [...props.rows].sort((a, b) => {
        let aVal = a[fieldOrder.value];
        let bVal = b[fieldOrder.value];
        if (aVal > bVal) return ascendente.value ? 1 : -1;
        else return ascendente.value ? -1 : 1;
    })
})

const sort = (field) => {
    if (field === fieldOrder.value) ascendente.value = !ascendente.value;
    else {
        fieldOrder.value = field;
        ascendente.value = true;
    }
}

const destroy = (id) => {
    if (!confirm(`¿Quieres borrar este ${props.model.name.toLowerCase()} definitivamente?`)) return;
    const row = props.rows.find(r => r.id === id);
    if (row && row.routes && row.routes.delete) {
        router.delete(row.routes.delete);
    }
}

const add = () => {
    router.get(props.model.routes.create);
}
</script>

<template>
    <Layout>
        <div class="container mx-auto p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Listado de {{ props.model.name }}s</h1>
                <button class="btn btn-primary" @click="add">
                    Añadir {{ props.model.name }}
                </button>
            </div>

            <div class="overflow-x-auto bg-base-100 rounded-lg shadow-md">
                <table class="table table-zebra w-full">
                    <thead class="bg-base-200">
                        <tr>
                            <th @click='sort(field)' v-for="(label, field) in fields" :key="field" class="cursor-pointer hover:bg-base-300">
                                <div class="flex items-center gap-2">
                                    {{ label }}
                                    <span v-if="field === fieldOrder" class="text-xs">
                                        {{ ascendente ? "▲" : "▼" }}
                                    </span>
                                </div>
                            </th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="row in rowsOrdered" :key="row.id" class="hover">
                            <td v-for="(label, key) in fields" :key="key">
                                {{ row[key] }}
                            </td>
                            <td class="text-right">
                                <div class="flex justify-end gap-2">
                                    <button class="btn btn-sm btn-outline btn-info" @click="router.get(row.routes.edit)">
                                        Editar
                                    </button>
                                    <button class="btn btn-sm btn-outline btn-error" @click="destroy(row.id)">
                                        Borrar
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </Layout>
</template>
