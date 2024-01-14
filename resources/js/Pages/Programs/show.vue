<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {computed} from "vue";

const props = defineProps({
    program: {
        type: Array,
        default: []
    },
    courses:{
        type:Array,
        default:[],
    },

})


const program = computed(() => props.program);


</script>

<template>
    <AuthenticatedLayout>

    </AuthenticatedLayout>
</template>

<style scoped>

</style>
