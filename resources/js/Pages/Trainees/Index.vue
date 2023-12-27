<script setup>
import {Head, router} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link} from "@inertiajs/vue3";
import DashboardCard from "@/Components/DashboardCard.vue";
import {ref} from "vue";
import model from "@/Components/Model.vue";
let isModalVisible = ref(false);


let showModal = () => {
    isModalVisible = true;
};
let closeModal = () => {
    isModalVisible = false;
};



let props = defineProps({
    trainees: Object,
});
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
                    <div class="flex">
                        <button class="  bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-xl">
                            Add a Trainee
                        </button>
                        <button @click="showModal" class="bg-blue-500 text-white px-4 py-2">Open Modal</button>
                        <Model v-if="isModalVisible" @close="closeModal"/>
                    </div>
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
