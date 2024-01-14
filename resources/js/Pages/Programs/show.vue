<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {computed} from "vue";

const props = defineProps({
    program: {
        type: Array,
        default: []
    },
    courses: {
        type: Array,
        default: [],
    },

})


const program = computed(() => props.program);


</script>

<template>
    <AuthenticatedLayout>
        <!--        quick note all the actions will be in modal -->

        <!--        the header of the program and its  informaiton-->

        <!--        here the coureses perview and its actions  -->


        <!--        here the coures titles perview and actions -->


        <!--        list of the student enrolled to this program -->

    </AuthenticatedLayout>
</template>

<style scoped>

</style>
