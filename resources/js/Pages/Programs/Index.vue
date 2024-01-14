<script setup>
import {Head, Link} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Drawer from "@/Components/Drawer.vue";
import CloseBoxIcon from "vue-material-design-icons/CloseBox.vue";
import {ref} from "vue";

const props = defineProps({
    programs: {
        type: Object,
    }
})
const isDrawerOpen = ref(false)
const toggleDrawer = () => {
    isDrawerOpen.value = !isDrawerOpen.value;
};

const closeDrawer = () => {
    isDrawerOpen.value = false;
};
</script>

<template>
    <Head title="البرامج التدريبية"/>
    <AuthenticatedLayout>
        <template  #header>
            <div dir="rtl">
                <h2 class="text-3xl font-bold mb-8">البرامج التدريبية</h2>
            </div>
        </template>
        <div class="mt-2 mx-4 bg-gray-100 rounded-sm">
            <p class="p-4">something here</p>
        </div>
        <main>
            <div dir="rtl" class="my-8">
                <!-- Note: البرامج التدريبية -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    <div v-for="(program, index) in programs" :key="index"
                         >
<!--                        :to="{ name: 'program', params: { id: program.id }}"-->
                        <div
                            class="bg-white p-6 mb-8  border border-gray-300 rounded-md transition duration-300 transform hover:shadow-lg">
                            <!-- Note: اسم البرنامج -->
                            <h3 class="text-xl font-bold mb-3">{{ program.name }}</h3>
                            <!-- Note: اسم التصنيف -->
                            <div class="flex gap-3">
                                <strong>تصنيف البرنامج</strong>
                                <p class="text-gray-600 mb-4">{{ program.category ? program.category.name :''}}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <!-- Note: عدد الساعات -->
                                    <p class="text-sm text-gray-500">عدد الساعات: {{ program.hour_count }}</p>
                                    <!-- Note: عدد الأيام -->
                                    <p class="text-sm text-gray-500">عدد الأيام: {{ program.days_count }}</p>
                                </div>
                                <!-- Note: مستوى البرنامج -->
                                <span class="bg-blue-500 text-white text-xs py-1 px-2 rounded-full">{{
                                        program.level
                                    }}</span>
                            </div>
                            <div class="flex gap-3">
                                <Link :href="route('program.show',program.id)">
                                    <div
                                        class="p-2 text-white bg-blue-300 rounded-xl border-sm text-center hover:bg-blue-600">
                                        عرض
                                    </div>
                                </Link>
                                <Link :href="route('program.edit',program.id)">
                                    <div
                                        class="p-2 text-white bg-blue-300 rounded-xl border-sm text-center hover:bg-blue-600">
                                        تعديل
                                    </div>
                                </Link>
                                <Link>
                                    <div
                                        class="p-2 text-white bg-red-300 rounded-xl border-sm text-center hover:bg-red-600">
                                        حذف
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </AuthenticatedLayout>
</template>
<!--hour_count-->
<!--days_count-->
<style scoped>

</style>
