<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900 ">Detalle del post</h3>
                            <p class="text-sm text-gray-600 ">{{ post.title }}</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white mx:rounded-md p-4">
                            <h1>{{ post.tittle }}</h1>
                            <p>{{ post.body }}</p>

                            <hr class="my-6">

                            <Link :href="route(goBack)">
                                Volver
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </AppLayout>
</template>

<script>
    export default{
        components:{
            AppLayout,
        },
        props:{
            post: Object,
            goBack : String,
        },
    }
</script>