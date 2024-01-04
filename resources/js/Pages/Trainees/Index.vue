<script setup>
import {Head, router, useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link} from "@inertiajs/vue3";
import {ref} from "vue";
import Drawer from "@/Components/Drawer.vue";
import CloseBoxIcon from "vue-material-design-icons/CloseBox.vue"
import EyeIcon from 'vue-material-design-icons/Eye.vue'
import AccountEditIcon from 'vue-material-design-icons/AccountEdit.vue'

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
    berthDate: '',
    educationalLevel: '',
    phoneNumber: '',
    email: '',
    startDate: '',
    uniqueSahapMail: '',
    states: '',
    endDate: '',
    note: '',
});
let submit = () => {
    // console.log(form);
    form.post(route('trainee.store'));
};
let itemStat = (state, arr) => {
    return {[state]: arr};
};

let statues = [
    'approved',
    'registered',
    'approved_lated',
    'denied',
    'graduated',
    'graduated_feeble',
    'feeble',
    'Suspended',
];

const state = (state) => {
    switch (state) {
        case 'approved':
            return 'مقبول';
        case 'registered':
            return 'مسجل';
        case 'approved_lated':
            return 'مقبول متأخر';
        case 'denied':
            return 'مرفوض';
        case 'graduated':
            return 'متخرج';
        case 'graduated_feeble':
            return 'متخرج متعثر';
        case 'feeble':
            return 'متعثر';
        case 'suspended':
            return 'موقوف';
        default:
            return 'لم يسجل الحالة';
    }
}
</script>

<template>
    <Head title="المتدربين"/>

    <AuthenticatedLayout>
        <template #header>
            <h1 dir="rtl">قائمة المتدربين</h1>
        </template>

        <div dir="rtl">
            <div class="mb-4 inline-flex w-full overflow-hidden rounded-lg bg-white shadow-md justify-between">
                <div class="-mx-3 px-4 py-2">

                </div>
                <div class="mt-2 mx-4 ">
                    <Drawer :is-open="isDrawerOpen" :speed="500" :max-width="'600px'" @close="closeDrawer">
                        <button @click="closeDrawer">
                            <close-box-icon/>
                        </button>
                        <div class="flex justify-center items-center h-screen">
                            <div dir="rtl" class="bg-blue-100 p-8 rounded-lg shadow-md w-full  ">
                                <h2 class="text-2xl font-semibold mb-6 text-right">إضافة متدرب جديد</h2>

                                <form @submit.prevent="submit" class="grid grid-cols-2 gap-3">
                                    <div class="mb-4">
                                        <label for="name" class="block text-sm font-medium text-gray-600">الاسم</label>
                                        <input v-model="form.name" type="text" id="name" name="name"
                                               class="input-field">
                                    </div>

                                    <div class="mb-4">
                                        <label for="berthDate" class="block text-sm font-medium text-gray-600">تاريخ
                                            الميلاد</label>
                                        <input v-model="form.berthDate" type="date" id="berthDate" name="berthDate"
                                               class="input-field">
                                    </div>

                                    <div class="mb-4">
                                        <label for="educationalLevel" class="block text-sm font-medium text-gray-600">المستوى
                                            التعليمي</label>
                                        <input v-model="form.educationalLevel" type="text" id="educationalLevel"
                                               name="educationalLevel" class="input-field">
                                    </div>

                                    <div class="mb-4">
                                        <label for="phoneNumber" class="block text-sm font-medium text-gray-600">رقم
                                            الهاتف</label>
                                        <input v-model="form.phoneNumber" type="text" id="phoneNumber"
                                               name="phoneNumber" class="input-field">
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="block text-sm font-medium text-gray-600">البريد
                                            الإلكتروني</label>
                                        <input v-model="form.email" type="email" id="email" name="email"
                                               class="input-field">
                                    </div>

                                    <div class="mb-4">
                                        <label for="startDate" class="block text-sm font-medium text-gray-600">تاريخ
                                            البداية</label>
                                        <input v-model="form.startDate" type="date" id="startDate" name="startDate"
                                               class="input-field">
                                    </div>

                                    <div class="mb-4">
                                        <label for="uniqueSahapMail" class="block text-sm font-medium text-gray-600">بريد
                                            شركة سحاب</label>
                                        <input v-model="form.uniqueSahapMail" type="text" id="uniqueSahapMail"
                                               name="uniqueSahapMail" class="input-field">
                                    </div>

                                    <div class="mb-4">
                                        <label for="states"
                                               class="block text-sm font-medium text-gray-600">الحالة</label>
                                        <select v-model="form.states" id="states" name="states"
                                                class="bg-white text-center input-field">
                                            <option value="approved">تم الموافقة</option>
                                            <option value="registered">تم التسجيل</option>
                                            <option value="approved_lated">تم الموافقة لاكن يؤجل</option>
                                            <option value="denied">تم الرفض</option>
                                            <option value="graduated">تم التخرج</option>
                                            <option value="graduated_feeble">تخرج بضعف</option>
                                            <option value="feeble">ضعيف</option>
                                            <option value="Suspended">معلق</option>
                                        </select>
                                    </div>

                                    <div class="col-span-2 mb-6">
                                        <label for="note"
                                               class="block text-sm font-medium text-gray-600">ملاحظات</label>
                                        <textarea v-model="form.note" id="note" name="note" rows="4"
                                                  class="bg-white input-field"></textarea>
                                    </div>

                                    <div class="col-span-2 flex justify-center">
                                        <button type="submit" class="btn-submit">إرسال</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </Drawer>
                    <button
                        class="border bg-blue-300 mx-4 my-2 p-2 rounded-sm cursor-pointer hover:bg-blue-400 text-center "
                        @click="toggleDrawer">اضافة متدرب
                    </button>
                </div>
            </div>


            <div class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table dir="rtl" class=" w-full text-sm text-right rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            اسم المتدرب
                        </th>
                        <th scope="col" class="px-6 py-3">
                            تاريخ الميلاد
                        </th>
                        <th scope="col" class="px-6 py-3">
                            المستوى التعليمي
                        </th>
                        <th scope="col" class="px-6 py-3">
                            رقم الهاتف
                        </th>
                        <th scope="col" class="px-6 py-3">
                            تاريخ الانضمام
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الحالة
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody v-for="trainee in trainees">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{ trainee.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ trainee.berthDate }}
                        </td>
                        <td class="px-6 py-4">
                            {{ trainee.EducationalLevel }}
                        </td>
                        <td class="px-6 py-4">
                            {{ trainee.phoneNumber }}
                        </td>

                        <td class="px-6 py-4">
                            {{ trainee.startDate }}
                        </td>

                        <td class="px-6 py-4">
                            <span :class="itemStat(trainee.states,statues)"
                                  class="whitespace-nowrap">{{ state(trainee.states) }}</span>
                        </td>

                        <td class="px-6 py-2 text-right">
                            <div class="flex gap-[10px]">
                                <Link :href="route('trainee.show',trainee.id)" class="text-blue-600  p-1">
                                    <EyeIcon/>
                                </Link>
                                <Link href="#" class="text-blue-600">
                                    <AccountEditIcon/>
                                </Link>
                                <Link href="#" class="">

                                </Link>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <div dir="rtl" class=" mt-10 border bg-sky-200 h-[200px] w-4/6">
            <header class="text-black px-4 py-6 font-extrabold ">
                <p>اسم المتدرب : </p>
                <p> المستوى التعليمي: </p>
            </header>
            <main class="px-4 text-sm ">
                رقم الهاتف
            </main>
            <footer>
                
            </footer>
        </div>


    </AuthenticatedLayout>
</template>

<style scoped>

.approved {
    @apply bg-green-600 text-white rounded-xl px-2 py-1;
}

.registered {
    @apply bg-blue-500 text-white rounded-xl px-2 py-1;
}

.approved_lated {
    @apply bg-yellow-500 text-white rounded-xl px-2 py-1;
}

.denied {
    @apply bg-red-600 text-white rounded-xl px-2 py-1;
}

.graduated {
    @apply bg-purple-700 text-white rounded-xl px-2 py-1;
}

.graduated_feeble {
    @apply bg-purple-400 text-white rounded-xl px-2 py-1;
}

.feeble {
    @apply bg-gray-300 text-gray-800 rounded-xl px-2 py-1;
}

.Suspended {
    @apply bg-red-800 text-white rounded-xl px-2 py-1;
}


.input-field {
    @apply mt-1 p-2 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300
}

.btn-submit {
    @apply px-6 py-2 bg-blue-500 text-white rounded-md cursor-pointer
}
</style>
