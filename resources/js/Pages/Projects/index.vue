<script setup>
import {computed, defineProps, ref} from 'vue';
  import {Layout} from "@/Layouts/Layout.vue";
  import {router} from "@inertiajs/vue3";


  const props = defineProps({fieldlabels:Object, projects:Array});

  const ascendente = ref(false);
  const fieldOrder = ref(Object.keys(props.fieldlabels)[0]);

  const projectsOrdered = computed (()=>{
    return [...props.projects].sort((a, b)=>{
      let aVal = a[fieldOrder.value];
      let bVal = b[fieldOrder.value];

      if (aVal > bVal)
        return ascendente.value? 1: -1;
      else
        return ascendente.value? -1: 1;
    })
  });


  const sort =(field)=>{
    if (field===fieldOrder.value) {
      ascendente.value = !ascendente.value;
    } else {
      fieldOrder.value = field
      ascendente.value = true
    }
  }

  const destroy = (id)=>{
    if (!confirm("Quieres borrar?"))
      return 0;
    router.delete(route("projects.destroy", id));
  }

  const add = ()=>{
    router.get(route("projects.create"))
  }

</script>

<template>
  <Layout>
  <div class="overflow-x-auto h-96 w-96">
    <h1><button class="btn btn-primary" @click="add">Añadir Proyecto</button></h1>
    <table class="table table-xs table-pin-rows table-pin-cols">
      <thead>
      <tr>
        <th @click='sort(field)' class="cursor-pointer" v-for="(label, field) in fieldlabels" :key="field">
          {{field}}
          <span v-if="field === fieldOrder">
            {{ascendente? "-->" : "<--"}}
          </span>
        </th>
        <th colspan="2">
        </th>
      </tr>
      </thead>
      <tbody>
        <tr v-for="project in projects" :key="project.id">
          <td v-for="(value, key) in fieldlabels">
            {{project[key]}}
          </td>
          <td><button class="btn btn-sm btn-glass p-1 cursor-pointer"
                      @click="router.get(route('projects.edit', project.id))">Editar
          </button></td>
          <td @click="destroy(project.id)" class="btn btn-sm btn-glass p-1 cursor-pointer">Borrar</td>
        </tr>
      </tbody>
    </table>
  </div>
  </Layout>
</template>

<style scoped>

</style>