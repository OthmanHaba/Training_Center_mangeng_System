<script setup>
import {Link} from "@inertiajs/vue3";
import {ref} from "vue";

const props = defineProps({
    innerText:String,
    items: {
        type: Array,
        default: () => [],
    },
});

let showingTwoLevelMenu = ref(false)
</script>

<template>
    <a class="flex items-center mt-4 py-2 px-6 text-gray-100" href="#" @click="showingTwoLevelMenu = !showingTwoLevelMenu">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path>
        </svg>
        <span class="mx-3">{{ innerText }}</span>
    </a>
    <transition
        enter-to-class="transition-all duration-300 ease-in-out"
        enter-from-class="max-h-0 opacity-25"
        leave-from-class="opacity-100 max-h-xl"
        leave-to-class="max-h-0 opacity-0">
        <div v-show="showingTwoLevelMenu">
            <ul class="overflow-hidden p-2 mx-4 mt-2 space-y-2 text-sm font-medium text-white bg-gray-700 bg-opacity-50 rounded-md shadow-inner"
                aria-label="submenu">
                <li v-for=" item in items " class="px-2 py-1 transition-colors duration-150">
                    <Link class="w-full" :href="route(item.route)">{{item.text}}</Link>
                </li>
            </ul>
        </div>
    </transition>
</template>

<style scoped>

</style>
