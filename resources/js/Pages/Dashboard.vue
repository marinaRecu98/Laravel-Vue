<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const modules = [
    {
        title: 'Proyectos',
        description: 'Gestión completa de proyectos, presupuestos y estados.',
        route: 'projects.index',
        color: 'from-orange-500 to-amber-600',
        icon: 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
    },
    {
        title: 'Trabajadores',
        description: 'Control de personal, turnos y datos de contacto.',
        route: 'workers.index',
        color: 'from-orange-400 to-amber-500',
        icon: 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
    },
    {
        title: 'Proveedores',
        description: 'Directorio de proveedores y gestión de suministros.',
        route: 'suppliers.index',
        color: 'from-amber-500 to-orange-600',
        icon: 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
    },
    {
        title: 'Pedidos',
        description: 'Seguimiento de pedidos de clientes y compras.',
        route: 'orders.index',
        color: 'from-orange-600 to-red-600',
        icon: 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z',
    },
    {
        title: 'Materias Primas',
        description: 'Inventario detallado y control de stock crítico.',
        route: 'raw-materials.index',
        color: 'from-amber-600 to-orange-700',
        icon: 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z',
    },
];
</script>

<template>
    <Head title="Panel de Control" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-2xl font-bold leading-tight text-gray-800">
                Panel de Control
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="module in modules"
                        :key="module.title"
                        class="group relative overflow-hidden rounded-2xl bg-white p-8 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
                    >
                        <!-- Gradient background accent -->
                        <div
                            :class="['absolute right-0 top-0 h-24 w-24 -translate-y-8 translate-x-8 rounded-full bg-gradient-to-br opacity-10 transition-transform duration-500 group-hover:scale-150', module.color]"
                        ></div>

                        <div class="relative z-10">
                            <!-- Icon Container -->
                            <div
                                :class="['mb-6 inline-flex rounded-xl bg-gradient-to-br p-3 text-white shadow-lg', module.color]"
                            >
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="module.icon" />
                                </svg>
                            </div>

                            <h3 class="mb-2 text-xl font-bold text-gray-900 group-hover:text-gray-800">
                                {{ module.title }}
                            </h3>
                            
                            <p class="mb-8 text-sm leading-relaxed text-gray-500">
                                {{ module.description }}
                            </p>

                            <Link
                                :href="route(module.route)"
                                class="inline-flex items-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2"
                            >
                                Acceder
                                <svg class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
/* Transiciones suaves para las sombras y el movimiento */
.rounded-2xl {
    border: 1px solid rgba(229, 231, 235, 0.5);
}
</style>
