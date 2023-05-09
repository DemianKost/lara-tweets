<template>
    <div class="container mx-auto flex justify-center mt-10 h-full">
        <div class="w-2/12 border border-slate-800 rounded-tl-lg py-6 px-6">
            <Menu />
            <button class="border border-blue-500 bg-blue-500 text-white text-center px-4 py-2 w-full rounded-full">Tweet</button>
        </div>
        <div class="w-8/12 border border-slate-800 rounded-tr-lg border-l-0">
            <div class="border-slate-800 border-b p-4">
                <h2 class="text-2xl text-white font-bold">Tweet</h2>
            </div>
            
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

        </div>
    </div>
</template>

<script setup>
    import Menu from '../../Shared/Menu.vue';
    import ChildTweet from './Components/ChildTweet.vue';

    let props = defineProps({
        tweet: Object
    });
</script>