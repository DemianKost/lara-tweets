<template>
    <div class="border-slate-800 border-b p-4">
        <h2 class="text-2xl text-white font-bold">Explore tweets</h2>
    </div>
    <div v-if="tweets" class="home-tweets">

        <TweetCard
            v-for="tweet in tweets.data"
            :key="tweet.id"
            :tweet="tweet"
        />

    </div>
    <div v-else class="home-tweets">
        <h2 class="text-xl text-center text-white py-4">Start following somebody to see tweets 😊</h2>
    </div>
</template>

<script setup>
    import DefaultLayout from '../../Layouts/DefaultLayout.vue';
    import TweetCard from '../../Shared/TweetCard.vue';

    defineOptions({ layout: DefaultLayout });

    let props = defineProps({
        tweets: Object
    })
</script>