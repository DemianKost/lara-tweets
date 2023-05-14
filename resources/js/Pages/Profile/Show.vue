<template>
    <div class="border-slate-800 border-b p-4">
        <h2 class="text-2xl text-white font-bold">Profile</h2>
    </div>
    <div class="user__block">
        <div class="user__block-wallpaper relative h-60 w-full bg-cover" style="background-image: url(https://images2.alphacoders.com/238/thumb-1920-238870.jpg);">
            <div class="user__block-avatar absolute -bottom-16 h-32 w-32 mb-4 ml-5 rounded-full ring-4 ring-slate-700 bg-cover" style="background-image: url(https://photobest1.com/wp-content/uploads/2018/05/Thailand-Wallpapers-background-HD-04.jpg);"></div>
        </div>
        <div class="user__block-meta flex justify-end p-4">
            <Link :href="`/follow/${profile.data.id}`" method="post" as="button" class="border border-blue-500 text-blue-500 px-4 py-2 rounded-full">{{ ( isFollowing ) ? 'Unfollow' : 'Follow' }}</Link>
        </div>
        <PorfileInfo
            :info="profile.data"
        />
    </div>
    <div class="tweets__block" v-if="tweets">
        <TweetCard
            v-for="tweet in tweets.data"
            :key="tweet.id"
            :tweet="tweet"
        />
    </div>
</template>

<script setup>
    import DefaultLayout from '../../Layouts/DefaultLayout.vue';
    import TweetCard from '../../Shared/TweetCard.vue';
    import PorfileInfo from '../Profile/Components/ProfileInfo.vue';

    defineOptions({ layout: DefaultLayout });

    let props = defineProps({
        profile: Object,
        tweets: Object,
        isFollowing: Boolean
    });
</script>