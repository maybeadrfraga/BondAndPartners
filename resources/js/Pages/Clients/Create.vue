<template>
<div>
    <Head title="Create Client" />
    <h1 class="mb-8 text-3xl font-bold">
    <Link class="text-indigo-400 hover:text-indigo-600" href="/client">Client</Link>
    <span class="text-indigo-400 font-medium">/</span> Create
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
    <form @submit.prevent="store">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
        <text-input v-model="form.name" :error="form.errors.first_name" class="pb-8 pr-6 w-full lg:w-1/2" label="First name" />        
        <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
        <loading-button :loading="form.processing" class="btn-indigo" type="submit">Create Client</loading-button>
        </div>
        </div>
    </form>
    </div>
</div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout'
import FileInput from '@/Shared/FileInput'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
components: {
    FileInput,
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
},
layout: Layout,
remember: 'form',
data() {
    return {
    form: this.$inertia.form({
        name: '',        
    }),
    }
},
methods: {
    store() {
    this.form.post('/client')
    },
},
}
</script>
  