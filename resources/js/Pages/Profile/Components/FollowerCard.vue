<template>
    <Link :href="`/profile/${follower.profile.id}`" class="w-1/2 bg-gray-800 p-4 rounded-md flex items-center">
        <div class="follower__avatar mr-4">
            <img :src="follower.profile.image" class="w-10 h-10 rounded-full" />
        </div>
        <div class="follower__info">
            <h2 class="text-lg text-white font-bold mb-2">{{ follower.profile.name }}</h2>
            <p class="text-xs text-gray-500 mb-0">@{{ follower.profile.username }}</p>
        </div>
    </Link>
</template>

<script setup>
    let props = defineProps({
        follower: Object
    })
</script>