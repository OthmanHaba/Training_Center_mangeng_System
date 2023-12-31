<script setup>
import {Head, router, useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link} from "@inertiajs/vue3";
import {ref} from "vue";
import Drawer from "@/Components/Drawer.vue";
import CloseBoxIcon from "vue-material-design-icons/CloseBox.vue"


const isDrawerOpen = ref(false);
const toggleDrawer = () => {
    isDrawerOpen.value = !isDrawerOpen.value;
};

const closeDrawer = () => {
    isDrawerOpen.value = false;
};
const props = defineProps({
    trainees: Object,
});

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
    <Head title="Trainees" />

    <AuthenticatedLayout>
        <template #header>
            Trainees
        </template>

        <div>
            <div class="mb-4 inline-flex w-full overflow-hidden rounded-lg bg-white shadow-md justify-between">
                <div class="-mx-3 px-4 py-2">
                    <div class="mx-3">
                        <span class="font-semibold text-blue-500">Info</span>
                        <p class="text-sm text-gray-600">Sample table page</p>
                    </div>
                </div>
                <div class="mt-2 mx-4 ">
                    <Drawer :is-open="isDrawerOpen" :speed="500" :max-width="'600px'" @close="closeDrawer">
                        <button @click="closeDrawer">
                            <close-box-icon/>
                        </button>
                        <form @submit.prevent="submit" class="ml-2 py-2 px-2 ">
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
                        </form>
                    </Drawer>
                    <button class="border bg-blue-300 mx-4 my-2 p-2 rounded-sm cursor-pointer hover:bg-blue-400 text-center" @click="toggleDrawer">Add Trainee</button>
                </div>
            </div>


            <div class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Trainee name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            phone number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            grade
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody v-for="trainee in trainees">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ trainee.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ trainee.phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ trainee.grade }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <Link :href="route('trainee.show',trainee.id)" class="mx-1  font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</Link>
                            <Link href="#" class="mx-1 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                            <Link href="#" class="mx-1 font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</Link>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>


    </AuthenticatedLayout>
</template>

<style scoped>

</style>
