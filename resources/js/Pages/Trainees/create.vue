<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import {useForm} from "@inertiajs/vue3";
// import Alert from "@/Components/Alert/Alert.vue";

let form = useForm({
    name: '',
    email: '',
    phone: '',
});
let submit = () => {
    // console.log(form);
    form.post(route('trainee.store'));
};
</script>

<template>
    <Head title="Trainees-create" />
    <authenticated-layout>
        <div class="mx-auto bg-white rounded p-8 shadow-md ">
            <h1 class="text-2xl font-semibold mb-6">Trainee Information</h1>

            <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Left Side -->
                <div>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-600 text-sm font-medium mb-2">Name</label>
                        <input type="text" v-model="form.name" id="name" name="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="John Doe" required>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-gray-600 text-sm font-medium mb-2">Phone Number</label>
                        <input type="tel" v-model="form.phone" id="phone"  name="phone" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="555-555-5555" required>
                    </div>
                    <div v-if="form.errors.phone" v-text="form.errors.phone" class="text-red-500 text-xs mt-1"></div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
                        <input type="email" id="email" v-model="form.email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="john.doe@example.com" required>
                    </div>
                    <div v-if="form.errors.phone" v-text="form.errors.phone" class="text-red-500 text-xs mt-1"></div>

                    <div class="mt-0">
                        <button  type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Submit
                        </button>
                    </div>
                </div>

                <!-- Right Side -->
                <div>
                    <!-- Submit Button (Bottom Right) -->
                    <!--some inputs-->>
                </div>
            </form>
        </div>
    </authenticated-layout>
</template>

<style scoped>

</style>
