<template>
    <div class="user__block-names border-slate-800 border-b px-4 pb-4 flex items-center">
        <div v-if="editing" class="w-1/2 flex flex-col">
            <input v-model="form.name" type="text" class="text-md text-white bg-transparent border-b p-2 mb-2" placeholder="Enter your name" />
            <textarea v-model="form.about" class="text-md text-white bg-transparent border-b p-2 mb-2" placeholder="Write about you"></textarea>
        </div>
        <div v-else class="w-1/2">
            <p class="text-2xl text-white font-bold">{{ info.name }}</p>
            <p class="text-xs text-gray-500 mb-2">@{{ info.username }}</p>
            <p class="text-md text-white">{{ info.about }}</p>
        </div>
        <div class="w-1/2 flex justify-end">
            <p class="text-md text-white font-bold">Followers: <span class="text-blue-500">{{ info.followers }}</span></p>
        </div>
    </div>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3';

    let props = defineProps({
        info: Object,
        editing: Boolean
    })
</script>