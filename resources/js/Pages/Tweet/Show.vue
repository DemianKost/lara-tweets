<template>
    <div class="border-slate-800 border-b p-4">
        <h2 class="text-2xl text-white font-bold">Tweet</h2>
    </div>
    <ResponseForm
        :tweet="tweet.data"
    />
    <div class="tweet__block border-slate-800 border-b flex space-x-4 p-4">
        <div class="tweet__block-avatar w-1/12">
            <div class="user__block-avatar h-16 w-16 mb-4 rounded-full bg-cover" style="background-image: url(https://photobest1.com/wp-content/uploads/2018/05/Thailand-Wallpapers-background-HD-04.jpg);"></div>
        </div>
        <div class="tweet__block-content w-11/12 relative">
            <div class="tweet__block-title flex items-center justify-between">
                <p class="text-lg text-white font-bold">{{ tweet.data.user.name }}</p>
                <p class="text-xs text-gray-500">{{ tweet.data.created_at }}</p>
            </div>
            <p class="text-xs text-gray-500 mb-2">@{{ tweet.data.user.username }}</p>
            <p class="text-md text-white">{{ tweet.data.body }}</p>

            <Link :href="`/tweet/${tweet.data.id}`" method="post" as="button" type="button" class="absolute text-blue-500 bottom-1 right-0">{{ tweet.data.likes }} Like</Link>
        </div>
    </div>
    <ChildTweet
        v-for="child_tweet in tweet.data.child"
        :key="child_tweet.id"
        :tweet="child_tweet"
    />
</template>

<script setup>
    import DefaultLayout from '../../Layouts/DefaultLayout.vue';
    import ResponseForm from './Components/ResponseForm.vue';
    import ChildTweet from './Components/ChildTweet.vue';

    defineOptions({ layout: DefaultLayout });

    let props = defineProps({
        tweet: Object
    });
</script>