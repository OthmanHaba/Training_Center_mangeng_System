<template>
    <header class="flex items-center justify-between border-b-4 border-indigo-600 bg-white px-6 py-4">
        <div class="flex items-center">
            <dropdown class="fixed inset-0 right-0">
                <template #trigger>
                    <button @click="dropdownOpen = ! dropdownOpen" class="flex relative overflow-hidden ">
                        {{ $page.props.auth.user.name }}
                        <MenuDownIcon @click="dropdownOpen = ! dropdownOpen"/>
                    </button>
                </template>

                <template #content>
                    <dropdown-link :href="route('profile.edit')" class="text-right ">
                        الملف الشخصي
                    </dropdown-link>

                    <dropdown-link class="w-full text-right" :href="route('logout')" method="post" as="button">
                        تسجيل الخروج
                    </dropdown-link>
                </template>
            </dropdown>
        </div>

        <div class="flex items-center">
            <button @click="$page.props.showingMobileMenu = !$page.props.showingMobileMenu"
                    class="text-gray-500 focus:outline-none lg:hidden">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </header>
</template>

<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import MenuDownIcon from 'vue-material-design-icons/MenuDown.vue'
</script>
