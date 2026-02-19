<script setup>
import { useForm } from "@inertiajs/vue3";
const props = defineProps({ material: Object | null });

const form = useForm({
    name: props.material?.name ?? "",
    description: props.material?.description ?? "",
    unit: props.material?.unit ?? "kg",
    stock: props.material?.stock ?? 0,
})

const submit = () => {
    if (props.material) {
        form.put(route("raw-materials.update", props.material.id));
    } else {
        form.post(route("raw-materials.store"));
    }
}
</script>

<template>
    <div class="flex justify-center mt-10">
        <div class="card w-full max-w-2xl bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold">
                    {{ props.material ? "Editar Materia Prima" : "Nueva Materia Prima" }}
                </h2>

                <form @submit.prevent="submit" class="space-y-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Nombre</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" v-model="form.name" required />
                        <label v-if="form.errors.name" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.name }}</span>
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Descripción</span>
                        </label>
                        <textarea class="textarea textarea-bordered w-full" v-model="form.description"></textarea>
                        <label v-if="form.errors.description" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.description }}</span>
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Unidad de Medida (kg, g, l, etc.)</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" v-model="form.unit" required />
                        <label v-if="form.errors.unit" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.unit }}</span>
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Stock Actual</span>
                        </label>
                        <input type="number" step="0.01" class="input input-bordered w-full" v-model="form.stock" required />
                        <label v-if="form.errors.stock" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.stock }}</span>
                        </label>
                    </div>

                    <div class="card-actions justify-end mt-6">
                        <button type="button" class="btn btn-ghost" @click="$inertia.visit(route('raw-materials.index'))">
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
