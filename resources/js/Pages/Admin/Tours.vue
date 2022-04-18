<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
</script>

<script>
    export default{
        components:{
            AppLayout,
        },
        props:{
            posts: Array,
        },
        data(){
            return {
                q : '',
                // post: this.tours,
            }
        },
        // watch :{
        //     q: function (value){
        //         this.$inertia.get(this.route('notes.index', {q: value}), {}, {preserveState: true})
        //     }
        // }
    }
</script>


<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de Tours
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900 ">Listado de tours</h3>
                            <p class="text-sm text-gray-600 ">Toma el registro correcto y ejecuta cualquier función (ver, editar o eliminar)</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="mx:rounded-md p-4">
                            <!-- <div class="flex justify-between">
                                <Link :href="route('posts.create')" class="bg-blue-500 text-white font-bold py-2 px-4 my-3 mb-2 rounded-md">
                                    Crear tour
                                </Link>
                                <input v-model="q" type="text" class="form-input rounded-md shadow-sm" placeholder="Buscar...">

                            </div> -->

                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <div class="flex justify-between">
                                    <div class="p-4">
                                        <label for="table-search" class="sr-only">Search</label>
                                        <div class="relative mt-1">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <input v-model="q" type="text" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  " placeholder="Search for items">
                                        </div>
                                    </div>
                                    <div class="py-6">
                                        <Link :href="route('posts.create')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            Crear tour
                                        </Link>
                                    </div>
                                </div>
                                <table class="w-full text-sm text-left text-gray-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Title
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <span class="sr-only">View</span>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="post in posts" :key="post.id" class="bg-white border-b  hover:bg-gray-50 ">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ post.title }}
                                            </th>
                                            <td class="px-6 py-4 text-right">
                                                <Link :href="route('posts.show', posts )" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver</Link>
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <Link :href="route('posts.edit', posts )" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- <table class="my-3">
                                <tr v-for="post in posts" :key="post.id" class="">
                                    <td class="border px-4 py-2">
                                        {{ post.title }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <Link :href="route('posts.show', posts )" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            View 
                                        </Link>
                                    </td>
                                    <td class="px-4 py-2">
                                        <Link :href="route('posts.edit', posts )" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            Editar
                                        </Link>
                                    </td>
                                </tr>
                            </table> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
