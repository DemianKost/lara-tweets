<template>
    <div class="tweet__form border-slate-800 border-b p-4">
        <h2 class="text-md text-white font-semibold mb-2">Create a new tweet</h2>
        <form @submit.prevent="createTweet()">
            <textarea v-model="form.body" type="text" class="text-white bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 w-full resize-none mb-0" rows="3" placeholder="Type here"></textarea>
            <div v-if="errors">
                <p class="text-xs text-red-500 mb-2" v-if="errors.body">{{ errors.body }}</p>
            </div>
            <div class="flex items-center">
                <label for="image" class="text-white cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4">
                        <path stroke-linecap="round" :stroke="(form.file != null) ? '#3b82f6' : '#fff'" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    <div v-if="form.progress">
                        {{ form.progress.percentage }}%
                    </div>
                    <input type="file" class="hidden" id="image" @input="form.file = $event.target.files[0]" />
                </label>
                <button type="submit" class="border border-blue-500 bg-blue-500 text-white text-sm text-center px-4 py-2 rounded-full">Create tweet</button>
            </div>
        </form>
    </div>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3';

    let props = defineProps({
        errors: Object
    })
    
    let form = useForm({
        body: '',
        file: null
    })

    async function createTweet() {
        await form.post('/tweet');
        
        if ( form.file != null ) {
            form.post('/upload');
        }

        form.body = '';
        form.file = null;
    }
</script>