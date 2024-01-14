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

const deleteProgram = (id) => {
    if (confirm("Are you sure you want to delete this program?")) {
        window.location.href = route('program.destroy', id);
    }
};
</script>

<template>
    <Head title="البرامج التدريبية"/>
    <AuthenticatedLayout>
        <template #header>
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
                        <div class="bg-white p-6 mb-8 border border-gray-300 rounded-md shadow-md hover:shadow-lg">
                            <!-- Image Placeholder -->
                            <div class="mb-4 w-full h-40 bg-gray-200 rounded-md overflow-hidden">
                                <!-- You can replace the src attribute with your actual image URL -->
                                <img class="w-full h-full object-cover" src="https://via.placeholder.com/500x200"
                                     alt="Program Image">
                            </div>

                            <!-- Program Name -->
                            <h3 class="text-2xl font-bold mb-3">{{ program.name }}</h3>

                            <!-- Program Category -->
                            <div class="mb-4">
                                <strong class="text-gray-600">تصنيف البرنامج:</strong>
                                <p class="text-blue-500">{{ program.category ? program.category.name : 'غير مصنف' }}</p>
                            </div>

                            <!-- Program Details -->
                            <div class="flex justify-between items-center mb-4">
                                <div class="text-gray-600">
                                    <p>عدد الساعات: {{ program.hour_count }}</p>
                                    <p>عدد الأيام: {{ program.days_count }}</p>
                                </div>

                                <span class="bg-blue-500 text-white text-xs py-1 px-2 rounded-full">
            {{ program.level }}
        </span>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex justify-end space-x-3">
                                <Link :href="route('program.show', program.id)"
                                      class="btn btn-active btn-accent mx-auto">عرض
                                </Link>

                                <Link :href="route('program.edit', program.id)" class="btn btn-active btn-accent">
                                    تعديل
                                </Link>

                                <Link method="delete" :href="route('program.destroy',program.id)"
                                      class="btn btn-error">
                                    حذف
                                </Link>
                                <Link href="" @click="deleteProgram(program.id)" class="btn btn-error">حذف</Link>
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
