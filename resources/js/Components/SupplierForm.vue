<script setup>
import { useForm } from "@inertiajs/vue3";
const props = defineProps({ supplier: Object | null });

const form = useForm({
    name: props.supplier?.name ?? "",
    contact_person: props.supplier?.contact_person ?? "",
    email: props.supplier?.email ?? "",
    phone: props.supplier?.phone ?? "",
    address: props.supplier?.address ?? "",
})

const submit = () => {
    if (props.supplier) {
        form.put(route("suppliers.update", props.supplier.id));
    } else {
        form.post(route("suppliers.store"));
    }
}
</script>

<template>
    <div class="flex justify-center mt-10">
        <div class="card w-full max-w-2xl bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold">
                    {{ props.supplier ? "Editar Proveedor" : "Nuevo Proveedor" }}
                </h2>

                <form @submit.prevent="submit" class="space-y-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Empresa</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" v-model="form.name" required />
                        <label v-if="form.errors.name" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.name }}</span>
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Persona de Contacto</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" v-model="form.contact_person" />
                        <label v-if="form.errors.contact_person" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.contact_person }}</span>
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Email</span>
                        </label>
                        <input type="email" class="input input-bordered w-full" v-model="form.email" />
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
                            <span class="label-text font-semibold">Dirección</span>
                        </label>
                        <textarea class="textarea textarea-bordered w-full" v-model="form.address"></textarea>
                        <label v-if="form.errors.address" class="label">
                            <span class="label-text-alt text-error">{{ form.errors.address }}</span>
                        </label>
                    </div>

                    <div class="card-actions justify-end mt-6">
                        <button type="button" class="btn btn-ghost" @click="$inertia.visit(route('suppliers.index'))">
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
