<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { useForm } from '@inertiajs/inertia-vue3';
</script>

<script>
    export default{
        components:{
            AppLayout,
        },
        props:{
            post: Object,
            goBack : String,
            errors: Object,
        },
        setup () {
            
        },
        data(){
            return {
                // form: {
                //     title: this.post.title,
                //     category_id : this.post.category_id,
                //     image : this.post.image,
                //     body : this.post.body,
                //     price : this.post.price,
                //     iframe : this.post.iframe,
                // }
                form : useForm({
                    title: this.post.title,
                    category_id : this.post.category_id,
                    image : this.post.image,
                    body : this.post.body,
                    price : this.post.price,
                    iframe : this.post.iframe,
                })
            }
        },
        methods:{
            submit(){
                console.log(this.form);
                // this.$inertia.put(this.route('posts.update', this.post), this.form)
                this.form.put(this.route('posts.update', this.post), this.form)
            },
            removeImage: function (e) {
                this.form.image = '';
            },
            previewImage: function(event) {
                // Reference to the DOM input element
                var input = event.target;
                this.form.image = input.files[0];
                console.log(this.form);
                // Ensure that you have a file before attempting to read it
                if (input.files && input.files[0]) {
                    // create a new FileReader to read this image and convert to base64 format
                    var reader = new FileReader();
                    // Define a callback function to run, when FileReader finishes its job
                    reader.onload = (e) => {
                        // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                        // Read image as base64 and set to imageData
                        // this.form.image = e.target.result;
                        this.form.image = input.files[0];
                    }
                    // Start the reader job - read file as a data url (base64 format)
                    reader.readAsDataURL(input.files[0]);
                    // console.log(reader);
                    // this.form.image = input.files[0];
                }
            },
        },
    }
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
                            <p class="text-sm text-gray-600 ">{{ post.title }}</p>
                            <small class="text-sm text-gray-500 ">Recuerda no repetir el nombre y rellenar los campos obligatorios.</small>
                        </div>
                    </div>

                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="mx:rounded-md p-4">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <form 
                                    @submit.prevent="submit" 
                                    class="bg-white border-b  hover:bg-gray-50 p-4">
                                    <div class="mb-6">
                                        <label 
                                            for="category" 
                                            class="block mb-2 text-sm font-medium text-gray-900">
                                            Category <span class="text-red-500">*</span>
                                        </label>
                                        <select 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            required
                                            v-model="form.category_id"
                                        >
                                            <option selected value="1">Tours</option>
                                            <option value="2">Servicies</option>
                                        </select>
                                    </div>
                                    <div class="mb-6">
                                        <label 
                                            for="title" 
                                            class="block mb-2 text-sm font-medium text-gray-900">
                                            Title <span class="text-red-500">*</span>
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
                                            for="description">
                                            Description <span class="text-red-500">*</span>
                                        </label>
                                        <textarea
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            rows="4" 
                                            placeholder="Leave a comment..."
                                            required
                                            v-model="form.body">
                                        </textarea>
                                    </div>
                                    <div class="mb-6">
                                        <label 
                                            for="title" 
                                            class="block mb-2 text-sm font-medium text-gray-900">
                                            Price
                                        </label>
                                        <input 
                                            v-model="form.price"
                                            type="text" 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                            >
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
                                            @input="form.image = $event.target.files[0]"
                                        >
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
                                            placeholder=""
                                            v-model="form.iframe">
                                        </textarea>
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