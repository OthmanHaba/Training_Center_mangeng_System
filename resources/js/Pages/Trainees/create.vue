<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import {useForm} from "@inertiajs/vue3";
// import Alert from "@/Components/Alert/Alert.vue";

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
</script>

<template>
    <Head title="Trainees-create" />
    <authenticated-layout>
        <div class="flex justify-center items-center h-screen">
            <div dir="rtl" class="bg-blue-100 p-8 rounded-lg shadow-md w-full  ">
                <h2 class="text-2xl font-semibold mb-6 text-right">إضافة متدرب جديد</h2>

                <form @submit.prevent="submit" class="grid grid-cols-2 gap-3">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600">الاسم</label>
                        <input v-model="form.name" type="text" id="name" name="name" class="input-field">
                    </div>

                    <div class="mb-4">
                        <label for="berthDate" class="block text-sm font-medium text-gray-600">تاريخ الميلاد</label>
                        <input v-model="form.berthDate" type="date" id="berthDate" name="berthDate" class="input-field">
                    </div>

                    <div class="mb-4">
                        <label for="educationalLevel" class="block text-sm font-medium text-gray-600">المستوى التعليمي</label>
                        <input v-model="form.educationalLevel" type="text" id="educationalLevel" name="educationalLevel" class="input-field">
                    </div>

                    <div class="mb-4">
                        <label for="phoneNumber" class="block text-sm font-medium text-gray-600">رقم الهاتف</label>
                        <input v-model="form.phoneNumber" type="text" id="phoneNumber" name="phoneNumber" class="input-field">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">البريد الإلكتروني</label>
                        <input v-model="form.email" type="email" id="email" name="email" class="input-field">
                    </div>

                    <div class="mb-4">
                        <label for="startDate" class="block text-sm font-medium text-gray-600">تاريخ البداية</label>
                        <input v-model="form.startDate" type="date" id="startDate" name="startDate" class="input-field">
                    </div>

                    <div class="mb-4">
                        <label for="uniqueSahapMail" class="block text-sm font-medium text-gray-600">بريد شركة سحاب</label>
                        <input v-model="form.uniqueSahapMail" type="text" id="uniqueSahapMail" name="uniqueSahapMail" class="input-field">
                    </div>

                    <div class="mb-4">
                        <label for="states" class="block text-sm font-medium text-gray-600">الحالة</label>
                        <select v-model="form.states" id="states" name="states" class="bg-white text-center input-field">
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

<!--                    <div class="mb-4">-->
<!--                        <label for="endDate" class="block text-sm font-medium text-gray-600">تاريخ الانتهاء</label>-->
<!--                        <input v-model="form.endDate" type="date" id="endDate" name="endDate" class="input-field">-->
<!--                    </div>-->

                    <div class="col-span-2 mb-6">
                        <label for="note" class="block text-sm font-medium text-gray-600">ملاحظات</label>
                        <textarea v-model="form.note" id="note" name="note" rows="4" class="bg-white input-field"></textarea>
                    </div>

                    <div class="col-span-2 flex justify-center">
                        <button type="submit" class="btn-submit">إرسال</button>
                    </div>
                </form>
            </div>
        </div>
    </authenticated-layout>
</template>

<style scoped>
.input-field {
   @apply  mt-1 p-2 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300
}

.btn-submit {
    @apply px-6 py-2 bg-blue-500 text-white rounded-md cursor-pointer
}
</style>
