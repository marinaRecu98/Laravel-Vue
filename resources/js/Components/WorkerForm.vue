<script setup>
import { useForm } from "@inertiajs/vue3";
const props = defineProps({ worker: Object | null });

const form = useForm({
    name: props.worker?.name ?? "",
    email: props.worker?.email ?? "",
    phone: props.worker?.phone ?? "",
    role: props.worker?.role ?? "",
})

const submit = () => {
    if (props.worker) {
        form.put(route("workers.update", props.worker.id));
    } else {
        form.post(route("workers.store"));
    }
}
</script>

<template>
    <div class="flex justify-center mt-10">
        <div class="card w-full max-w-2xl bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold">
                    {{ props.worker ? "Editar Trabajador" : "Nuevo Trabajador" }}
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
                            <span class="label-text font-semibold">Email</span>
                        </label>
                        <input type="email" class="input input-bordered w-full" v-model="form.email" required />
                        <label v-if="form.errors.email" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.email }}</span>
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Teléfono</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" v-model="form.phone" />
                        <label v-if="form.errors.phone" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.phone }}</span>
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Cargo</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" v-model="form.role" />
                        <label v-if="form.errors.role" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.role }}</span>
                        </label>
                    </div>

                    <div class="card-actions justify-end mt-6">
                        <button type="button" class="btn btn-ghost" @click="$inertia.visit(route('workers.index'))">
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
