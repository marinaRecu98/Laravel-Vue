<script setup>
import { useForm } from "@inertiajs/vue3";
const props = defineProps({ order: Object | null });

const form = useForm({
    order_number: props.order?.order_number ?? "",
    status: props.order?.status ?? "pendiente",
    total_amount: props.order?.total_amount ?? 0,
})

const submit = () => {
    if (props.order) {
        form.put(route("orders.update", props.order.id));
    } else {
        form.post(route("orders.store"));
    }
}
</script>

<template>
    <div class="flex justify-center mt-10">
        <div class="card w-full max-w-2xl bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold">
                    {{ props.order ? "Editar Pedido" : "Nuevo Pedido" }}
                </h2>

                <form @submit.prevent="submit" class="space-y-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Número de Pedido</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" v-model="form.order_number" required />
                        <label v-if="form.errors.order_number" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.order_number }}</span>
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Estado</span>
                        </label>
                        <select class="select select-bordered w-full" v-model="form.status">
                            <option value="pendiente">Pendiente</option>
                            <option value="en_proceso">En Proceso</option>
                            <option value="completado">Completado</option>
                            <option value="cancelado">Cancelado</option>
                        </select>
                        <label v-if="form.errors.status" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.status }}</span>
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Importe Total (€)</span>
                        </label>
                        <input type="number" step="0.01" class="input input-bordered w-full" v-model="form.total_amount" required />
                        <label v-if="form.errors.total_amount" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.total_amount }}</span>
                        </label>
                    </div>

                    <div class="card-actions justify-end mt-6">
                        <button type="button" class="btn btn-ghost" @click="$inertia.visit(route('orders.index'))">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary" :class="{ 'btn-disabled loading': form.processing }">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
