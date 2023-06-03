<template>
    <div class="fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 p-4 w-1/3 border-slate-800 bg-gray-900 border rounded-md">
        <div class="flex items-center justify-between mb-2">
            <h2 class="text-2xl text-white">Create tweet</h2>
            <span @click="closeModal()" class="text-2xl text-white cursor-pointer">×</span>
        </div>
        <TweetForm
            :errors="errors"
        />
    </div>
</template>

<script setup>
    import { defineEmits } from 'vue';
    import TweetForm from '../Pages/Profile/Components/TweetForm.vue';
    
    let props = defineProps({
        errors: Object
    });

    const emit = defineEmits(['closeModal']);

    function closeModal() {
        emit('closeModal');
    }
</script>