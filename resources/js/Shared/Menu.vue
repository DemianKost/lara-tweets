<template>
    <ul class="flex flex-col space-y-6 mb-8">
        <li class="text-white text-lg font-bold flex items-center">
            <img src="/icons/home.svg" class="w-6 h-6 mr-2" />
            <Link href="/">Home</Link>
        </li>
        <li class="text-white text-lg font-bold flex items-center">
            <img src="/icons/hashtag.svg" class="w-6 h-6 mr-2" />
            <Link href="/explore">Explore</Link>
        </li>
        <li class="text-white text-lg font-bold flex items-center">
            <img src="/icons/notifications.svg" class="w-6 h-6 mr-2" />
            <Link href="#">Notifications</Link>
        </li>
        <li class="text-white text-lg font-bold flex items-center">
            <img src="/icons/bookmarks.svg" class="w-6 h-6 mr-2" />
            <Link href="/bookmark">Bookmarks</Link>
        </li>
        <li class="text-white text-lg font-bold flex items-center">
            <img src="/icons/lists.svg" class="w-6 h-6 mr-2" />
            <Link href="#">Lists</Link>
        </li>
    </ul>
</template>