<template>
    <div class="user__block-names border-slate-800 border-b px-4 pb-4">
        <p class="text-2xl text-white font-bold">{{ info.name }}</p>
        <p class="text-xs text-gray-500 mb-2">@{{ info.username }}</p>
        <p class="text-md text-white">{{ info.about }}</p>
    </div>
</template>

<script setup>
    defineProps({
        info: Object
    })
</script>