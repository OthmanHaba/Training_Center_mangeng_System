<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {computed} from "vue";

const props = defineProps({
    program: {
        type: Array,
        default: []
    }
})


const program = computed(() => props.program);


</script>

<template>
    <AuthenticatedLayout>
        <h1>{{props.program.name}}</h1>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
