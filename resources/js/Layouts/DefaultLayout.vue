<template>
    <div class="container mx-auto flex justify-center mt-10 h-full">
        <div class="w-2/12 border border-slate-800 rounded-tl-lg py-6 px-6">
            <Menu />
            <button @click="showTweetModal = true" class="border border-blue-500 bg-blue-500 text-white text-center px-4 py-2 w-full rounded-full">Tweet</button>
        </div>
        <div class="w-8/12 border border-slate-800 rounded-tr-lg border-l-0">
            <slot />
        </div>
    </div>
    <TweetModal
        v-if="showTweetModal"
        :errors="errors"
        @closeModal="closeTweetModal()"
    />
</template>

<script setup>
    import { ref } from 'vue';
    import Menu from '../Shared/Menu.vue';
    import TweetModal from '../Shared/TweetModal.vue';
    
    const showTweetModal = ref(false);

    let props = defineProps({
        errors: Object
    })

    function closeTweetModal() {
        showTweetModal.value = false;
    }
</script>