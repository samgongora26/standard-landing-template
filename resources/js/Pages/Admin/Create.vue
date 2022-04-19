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
                    <!-- Left -->
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900 ">Crea una publicación</h3>
                            <p class="text-sm text-gray-600 ">La publicación será guardada en la categoría que elija</p>
                        </div>
                    </div>

                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="mx:rounded-md p-4">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <form class="bg-white border-b  hover:bg-gray-50 p-4">
                                    <div class="mb-6">
                                        <label 
                                            for="category" 
                                            class="block mb-2 text-sm font-medium text-gray-900">
                                            Category
                                        </label>
                                        <select 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            required
                                            v-model="form.category"
                                        >
                                            <option selected value="1">Tours</option>
                                            <option value="2">Servicies</option>
                                        </select>
                                    </div>
                                    <div class="mb-6">
                                        <label 
                                            for="title" 
                                            class="block mb-2 text-sm font-medium text-gray-900">
                                            Title
                                        </label>
                                        <input 
                                            v-model="form.title"
                                            type="text" 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                            required>
                                    </div>
                                    <div class="mb-6">
                                        <label 
                                            class="block mb-2 text-sm font-medium text-gray-900"
                                            for="image">
                                            Image
                                        </label>
                                        <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer "
                                            aria-describedby="user_avatar_help" 
                                            type="file"
                                            @change="onFileChange"
                                        >
                                    </div>
                                    <div class="mb-6">
                                        <label 
                                            class="block mb-2 text-sm font-medium text-gray-900"
                                            for="description">
                                            Description
                                        </label>
                                        <textarea
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            rows="4" 
                                            placeholder="Leave a comment..."
                                            required>
                                        </textarea>
                                    </div>
                                    <div class="mb-6">
                                        <label 
                                            class="block mb-2 text-sm font-medium text-gray-900"
                                            for="embed">
                                            Embed
                                        </label>
                                        <textarea
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            rows="2" 
                                            placeholder="">
                                        </textarea>
                                    </div>
                                    <div class="mb-">
                                        <label for="">Imagen</label>
                                        <img :src="form.image" alt="" @click="removeImage">
                                    </div>

                                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
                                </form>
                                
                            </div>

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
            return {
                form: {
                    title: '',
                    category : '',
                    image : '',
                    body : '',
                    price : '',
                    iframe : '',
                }
            }
        },
        methods:{
            submit(){
                this.$inertia.post(this.route('posts.store'), this.form)
            },
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
                console.log(this.form.image);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this.form;

                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            removeImage: function (e) {
                this.form.image = '';
            }
        }
    }
</script>