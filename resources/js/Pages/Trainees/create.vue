<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

<template>
    <authenticated-layout>
        <div class="mx-auto bg-white rounded p-8 shadow-md ">
            <h1 class="text-2xl font-semibold mb-6">Trainee Information</h1>

            <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Left Side -->
                <div>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-600 text-sm font-medium mb-2">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="John Doe" required>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-gray-600 text-sm font-medium mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="555-555-5555" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="john.doe@example.com" required>
                    </div>
                    <div class="mt-0">
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
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
