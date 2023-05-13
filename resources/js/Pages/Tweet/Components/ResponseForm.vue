<template>
    <div class="tweet__form border-slate-800 border-b p-4">
        <h2 class="text-md text-white font-semibold mb-2">Write a response for tweet</h2>
        <form @submit.prevent="responseTweet()">
            <textarea v-model="form.body" type="text" class="text-white bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 w-full resize-none mb-2" rows="3" placeholder="Type here"></textarea>
            <button type="submit" class="border border-blue-500 bg-blue-500 text-white text-sm text-center px-4 py-2 rounded-full">Create tweet</button>
        </form>
    </div>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3';

    let props = defineProps({
        tweet: Object
    })

    let form = useForm({
        body: ''
    })

    function responseTweet() {
        form.post(`/tweet/${props.tweet.id}/respond`);
        form.body = '';
    }
</script>