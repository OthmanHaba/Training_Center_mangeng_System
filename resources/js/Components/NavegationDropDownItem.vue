<script setup>
import {Link, router} from "@inertiajs/vue3";
import {ref} from "vue";
import MenuIcon from 'vue-material-design-icons/Menu.vue';


const props = defineProps({
    innerText: String,
    items: {
        type: Array,
        default: () => [],
    },
});

let showingTwoLevelMenu = ref(false)
</script>

<template>
    <button
        class="w-full flex justify-between mt-4 py-2 px-6 text-gray-100"
        @click="showingTwoLevelMenu = !showingTwoLevelMenu"
    >
        <MenuIcon/>
        <span class="mx-3">{{ innerText }}</span>
    </button>
    <transition >
        <div v-show="showingTwoLevelMenu" class="overflow-hidden">
            <ul
                class="bg-gray-600 text-white shadow-xl border-r p-2 shadow-cyan-950 "
                aria-label="submenu"
            >
                <li
                    v-for="item in items"
                    class="px-2 py-1 transition-colors duration-150 hover:bg-gray-800 rounded-l text-right  mt-1 p-1 border-r-4 hover:border-r-amber-700 hover:-translate-x-1 hover:transform ease-in-out"
                >
                    <Link class="w-full" :href="route(item.route)">{{ item.text }}</Link>

                </li>
            </ul>
        </div>
    </transition>
</template>

<style lang="scss" scoped>
.v-enter-active, .v-leave-active {
    transition: transform 0.4s;
    overflow: hidden;
}

.v-enter-from, .v-leave-to {
    transform: scaleY(0%);
    transform-origin: top;
}

.v-enter-to, .v-leave-from {
    transform: scaleY(100%);
    transform-origin: top;
}

</style>


