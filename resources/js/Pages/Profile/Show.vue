<template>
    <div class="container mx-auto flex justify-center mt-10 h-full">
        <div class="w-2/12 border border-slate-800 rounded-tl-lg py-6 px-6">
            <Menu />
            <button class="border border-blue-500 bg-blue-500 text-white text-center px-4 py-2 w-full rounded-full">Tweet</button>
        </div>
        <div class="w-8/12 border border-slate-800 rounded-tr-lg border-l-0">
            <div class="border-slate-800 border-b p-4">
                <h2 class="text-2xl text-white font-bold">Profile</h2>
            </div>
            <div class="user__block">
                <div class="user__block-wallpaper relative h-60 w-full bg-cover" style="background-image: url(https://images2.alphacoders.com/238/thumb-1920-238870.jpg);">
                    <div class="user__block-avatar absolute -bottom-16 h-32 w-32 mb-4 ml-5 rounded-full ring-4 ring-slate-700 bg-cover" style="background-image: url(https://photobest1.com/wp-content/uploads/2018/05/Thailand-Wallpapers-background-HD-04.jpg);"></div>
                </div>
                <div class="user__block-meta flex justify-end p-4">
                    <a href="#" class="border border-blue-500 text-blue-500 px-4 py-2 rounded-full">Follow</a>
                </div>
                <div class="user__block-names border-slate-800 border-b px-4 pb-4">
                    <p class="text-2xl text-white font-bold">{{ profile.data.name }}</p>
                    <p class="text-xs text-gray-500 mb-2">@{{ profile.data.username }}</p>
                    <p class="text-md text-white">{{ profile.data.about }}</p>
                </div>
            </div>

            <div class="tweets__block" v-if="tweets">
                
                <TweetCard
                    v-for="tweet in tweets.data"
                    :key="tweet.id"
                    :tweet="tweet"
                />

            </div>
        </div>
    </div>
</template>

<script setup>
    import Menu from '../../Shared/Menu.vue';
    import TweetCard from '../../Shared/TweetCard.vue';

    let props = defineProps({
        profile: Object,
        tweets: Object
    });
</script>