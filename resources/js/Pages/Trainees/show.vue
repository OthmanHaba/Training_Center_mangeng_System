<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
let props = defineProps({
    trainee: Object,
});
</script>

<template>
<AuthenticatedLayout>
    <p> this is a trainee account for <strong>{{trainee.name}}</strong> and hs id is {{trainee.id}} </p>
</AuthenticatedLayout>
</template>

<style scoped>

</style>
