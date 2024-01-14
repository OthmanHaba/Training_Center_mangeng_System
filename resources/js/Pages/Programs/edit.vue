<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {useForm} from "@inertiajs/vue3";
import Modal from "@/Components/Modal.vue";
import {computed, ref} from "vue";
import closeIcon from 'vue-material-design-icons/Close.vue'
import axios from "axios";
import {toRefs} from "vue";

const props = defineProps({
    categories: {
        type: Array,
        default: [],
    },
    program:{
        type:Array,
        default:[]
    }
});
const updatedCategories = computed(() => props.categories )
// const updatedCategories =  ref(props.categories);
const modalShow = ref(false);

const categoryForm = useForm({
    name: '',
})
const form = useForm({
    name: '',
    category_id: 0,
    hour_count: '',
    days_count: '',
});
const openCategoryModal = () => {
    console.log(modalShow.value)
    modalShow.value = !modalShow.value;
};
const addProgram = () => {
    form.post(route('program.update'))
};
const deleteCategory = async (category_id) => {
    await axios.delete(`/api/category/${category_id}`)
        .then(res => {
            if (res.status === 200) {
                deleteFromTable(category_id)
            }
        })
        .catch(e => {
            console.log(`server error ${e}`)
        });

}

const deleteFromTable = (idToDelete)=>{
     updatedCategories.value.forEach((item,index) =>{
        if(item.id === idToDelete){
            updatedCategories.value.splice(index,1)
        }
    })
}

const addCategories = async () => {
    try {
        const res = await axios.post(route('category.post'), categoryForm.data());
        const newReq = res.data;
        updatedCategories.value.push(newReq)
        categoryForm.name = '';
    } catch (e) {
        console.error('Error submitting form:', e);
    }
};
</script>

<template>
    <AuthenticatedLayout>
        <div dir="rtl" class="container mx-auto mt-8">
            <Modal :show="modalShow" @close="openCategoryModal">
                <div class="text-center cursor-pointer w-2">
                    <close-icon @click="openCategoryModal"/>
                </div>
                <div dir="rtl" class="container mx-auto p-4">
                    <h1 class="text-2xl font-bold mb-4">قائمة الأسماء</h1>

                    <!-- Form to add a new name -->
                    <form @submit.prevent="addCategories" class="mb-4">
                        <div class="flex items-center gap-1.5">
                            <label for="name" class="mr-2">الاسم:</label>
                            <input v-model="categoryForm.name" type="text" id="name" class="border p-2 rounded-md">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2">إضافة
                            </button>
                        </div>
                    </form>

                    <!-- Table to display names -->
                    <table class="w-full border">
                        <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">اسم تصنيف البرنامج التدريبي</th>
                            <th class="border p-2 text-xs text-blue">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="category in categories" :key="category.id">
                            <td class="border p-2">{{ category.name }}</td>
                            <td class="border p-2 ">
                                <button @click="deleteCategory(category.id)"
                                        class="p-2 bg-red-300 rounded text-gray-600 hover:bg-red-500 cursor-pointer">حذف
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </Modal>

            <form @submit.prevent="addProgram">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">اسم البرنامج</label>
                    <input v-model="form.name" type="text" id="name" name="name" required
                           class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-600">فئة البرنامج</label>
                    <div class="flex items-center gap-2">
                        <select
                            v-model="form.category_id"
                            name="category"
                            class="mt-1 p-2 w-full border rounded-md"
                            required
                        >
                            <option
                                v-for="category in categories"
                                :value="category.id"
                            >{{ category.name }}
                            </option>

                        </select>
                        <button type="button" @click="openCategoryModal"
                                class="ml-2 bg-green-500 text-white px-2 py-1 rounded-md">+
                        </button>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="hourCount" class="block text-sm font-medium text-gray-600">عدد الساعات</label>
                    <input v-model="form.hour_count" type="number" id="hourCount" name="hourCount"
                           required
                           class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="daysCount" class="block text-sm font-medium text-gray-600">عدد الأيام</label>
                    <input v-model="form.days_count" type="number" id="daysCount" name="daysCount"
                           required
                           class="mt-1 p-2 w-full border rounded-md">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">إضافة البرنامج</button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
