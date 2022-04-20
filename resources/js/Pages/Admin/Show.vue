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
                            <h2 class="mt-1 text-lg font-bold text-white sm:text-slate-900 md:text-2xl ">{{ post.title }}</h2>
                            <p>{{ post.body }}</p>
                            <div class="grid gap-4 col-start-1 col-end-3 row-start-1 sm:mb-6 sm:grid-cols-4 lg:gap-6 lg:col-start-2 lg:row-end-6 lg:row-span-6 lg:mb-0">
                                <img v-if="post.image" :src="postImage" class="hidden w-full h-52 object-cover rounded-lg sm:block sm:col-span-4 md:col-span-4 lg:row-start-2 lg:col-span-4 lg:h-60">
                            </div>
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
        data(){
            postImage : ''
        },
        methods:{
            loadPostImage(){
                this.postImage = '/storage/' + this.post.image;
            }
        },
        created(){
            //Se ejecuta cuando se haya cargado la pagina
            this.loadPostImage();
        }
    }
</script>