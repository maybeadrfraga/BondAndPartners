<!-- <template>
    <div>
      <Head title="Clients" />
      <h1 class="mb-8 text-3xl font-bold">Clients</h1>
    </div>
</template>
  
  <script>
  import { Head } from '@inertiajs/inertia-vue3'
  import Layout from '@/Shared/Layout'
  
  export default {
    components: {
      Head,
    },
    layout: Layout,
  }
  </script>
   -->

<template>
    <div>
        <Head title="Client" />
        <h1 class="mb-8 text-3xl font-bold">Clients</h1>
        <div class="flex items-center justify-between mb-6">        
        <Link class="btn-indigo" href="/client/create">
            <span>Create</span>
            <span class="hidden md:inline">&nbsp;Client</span>
        </Link>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Name</th>          
          <th class="pb-4 pt-6 px-6">Agent</th>          
        </tr>
        <tr v-for="client in clients" :key="client.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/client/${client.id}/edit`">              
              {{ client.name }}              
            </Link>
          </td>          
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/client/${client.id}/edit`">              
              {{ client.users }}              
            </Link>
          </td>          
        </tr>
        <tr v-if="clients.length === 0">
          <td class="px-6 py-4 border-t" colspan="4">No users found.</td>
        </tr>
      </table>
    </div>
        
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout'

export default {
components: {
    Head,      
    Link,      
},
layout: Layout,
props: {
    clients: Object,    
}    
}
</script>
  