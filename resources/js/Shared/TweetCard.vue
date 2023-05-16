<template>
    <Link :href="`/tweet/${tweet.id}`" class="tweet__block border-slate-800 border-b flex space-x-4 p-4">
        <div class="tweet__block-avatar w-1/12">
            <div class="user__block-avatar h-16 w-16 mb-4 rounded-full bg-cover" style="background-image: url(https://photobest1.com/wp-content/uploads/2018/05/Thailand-Wallpapers-background-HD-04.jpg);"></div>
        </div>
        <div class="tweet__block-content w-11/12 relative">
            <div class="tweet__block-title flex items-center justify-between">
                <p class="text-lg text-white font-bold">{{ tweet.user.name }}</p>
                <p class="text-xs text-gray-500">{{ tweet.created_at }}</p>
            </div>
            <p class="text-xs text-gray-500 mb-2">@{{ tweet.user.username }}</p>
            <p class="text-md text-white">{{ tweet.body }}</p>
            
            <Link class="absolute text-blue-500 bottom-1 right-14 flex items-center space-x-1">
                <span>{{ tweet.child_count }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                </svg>
            </Link>
            <Link :href="`/bookmark/${tweet.id}`" method="post" as="button" type="button" :class="( tweet.bookmarked ) ? 'absolute bottom-1 right-28 text-white' : 'absolute bottom-1 right-28 text-blue-500'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                </svg>
            </Link>
            <Link :href="`/tweet/${tweet.id}`" method="post" as="button" type="button" class="absolute text-blue-500 bottom-1 right-0">{{ tweet.likes }} Like</Link>
        </div>
    </Link>
</template>

<script setup>
    let props = defineProps({
        tweet: Object
    })
</script>