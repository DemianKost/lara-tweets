<template>
    <div class="border-slate-800 border-b p-4">
        <h2 class="text-2xl text-white font-bold">Profile</h2>
    </div>
    <div class="user__block">
        <div class="user__block-wallpaper relative h-60 w-full bg-cover" style="background-image: url(https://images2.alphacoders.com/238/thumb-1920-238870.jpg);">
            <div class="user__block-avatar absolute -bottom-16 h-32 w-32 mb-4 ml-5 rounded-full ring-4 ring-slate-700 bg-cover" style="background-image: url(https://photobest1.com/wp-content/uploads/2018/05/Thailand-Wallpapers-background-HD-04.jpg);"></div>
        </div>
        <div class="user__block-meta flex justify-end p-4">
            <form @submit.prevent="updateProfile()" v-if="editing">
                <button type="submit" class="border border-blue-500 bg-blue-500 text-white px-4 py-2 rounded-full">Save</button>
            </form>
            <button v-else @click="editing = ! editing" type="button" class="border border-blue-500 text-blue-500 px-4 py-2 rounded-full">Edit profile</button>
        </div>
        <ProfileInfo
            :info="profile.data"
            :editing="editing"
        />
    </div>
    <div class="tweets__form-block">
        <TweetForm
            :errors="errors"
        />
    </div>
    <div class="tweets__block">
        <TweetCard
            v-for="tweet in tweets.data"
            :key="tweet.id"
            :tweet="tweet"
        />
    </div>
</template>

<script setup>
    import DefaultLayout from '../../Layouts/DefaultLayout.vue';
    import { ref } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import TweetCard from '../../Shared/TweetCard.vue';
    import TweetForm from './Components/TweetForm.vue';
    import ProfileInfo from './Components/ProfileInfo.vue';
    
    defineOptions({ layout: DefaultLayout });

    const editing = ref(false);

    let props = defineProps({
        errors: Object,
        profile: Object,
        tweets: Object
    });

    let editForm = useForm({
        name: props.profile.data.name,
        about: props.profile.data.about
    });

    function updateProfile() {
        editForm.post('/profile/update');
        editing.value = false;
    }
</script>