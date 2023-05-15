<template>
    <div class="border-slate-800 border-b p-4">
        <h2 class="text-2xl text-white font-bold">Your bookmarks</h2>
    </div>
    <div class="bookmarks-content">

        <TweetCard
            v-for="tweet in tweets.data"
            :key="tweet.tweet.id"
            :tweet="tweet.tweet"
        />

    </div>
</template>

<script setup>
    import DefaultLayout from '../../Layouts/DefaultLayout.vue';
    import TweetCard from '../../Shared/TweetCard.vue';
    
    defineOptions({ layout: DefaultLayout })

    let props = defineProps({
        tweets: Object
    })
</script>