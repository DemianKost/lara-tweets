<template>
    <div class="border-slate-800 border-b p-4">
        <h2 class="text-2xl text-white font-bold">{{ title }}</h2>
    </div>
    <div v-if="followers" class="followers__block flex flex-wrap p-4">
        <FollowerCard
            v-for="follower in followers.data"
            :key="follower.id"
            :follower="follower"
        />
    </div>
    <div v-else class="flex justify-center py-4">
        <h2 class="text-2xl text-white">You don't have any followers</h2>
    </div>
</template>

<script setup>
    import DefaultLayout from '../../Layouts/DefaultLayout.vue';
    import FollowerCard from './Components/FollowerCard.vue';

    defineOptions({ layout: DefaultLayout })

    let props = defineProps({
        title: String,
        followers: Object
    })
</script>