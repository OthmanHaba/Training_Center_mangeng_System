<script setup>
defineProps([
    "title",
    "count",
])
</script>

<template>
    <div class="container mx-auto mt-8 flex items-center justify-center">
        <div class="max-w-md w-full bg-white shadow-lg rounded-lg overflow-hidden flex items-center p-4">
            <div class="mr-4">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C6.48 2 2 7.17 2 12c0 5.1 3.93 9.62 9 10.26V21a1 1 0 0 0 2 0v-1.74c5.07-.64 9-5.16 9-10.26 0-4.83-4.48-10-10-10zm0 14c-2.21 0-4-1.79-4-4s1.79-4 4-4s4 1.79 4 4s-1.79 4-4 4zM12 6s-2 3.58-2 5.5S10 17 12 17s2-1.42 2-2.5S14 8 12 6z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-800">{{title}}</h2>
                <p>{{ count }}</p>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
