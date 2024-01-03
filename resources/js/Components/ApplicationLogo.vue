<template>
    <div class=" flex justify-center items-center mt-8">
        <div class="flex items-center">
            <img src="/shp.png" alt="sahap camp" class="h-16 w-16">

            <span :class="props.class ?? ''" class="mx-2 text-2xl font-semibold text-black">SahapCamp</span>
        </div>
    </div>
</template>
<script setup>
const props = defineProps({
    class:Array
})
</script>
