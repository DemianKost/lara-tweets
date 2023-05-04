<template>
    <div class="container mx-auto flex justify-center mt-10 h-full">
        <div class="w-2/12 border border-slate-800 rounded-tl-lg py-6 px-6">
            <ul class="flex flex-col space-y-6 mb-8">
                <li class="text-white text-lg font-bold flex items-center"><img src="/icons/home.svg" class="w-6 h-6 mr-2" /><Link href="#">Home</Link></li>
                <li class="text-white text-lg font-bold flex items-center"><img src="/icons/hashtag.svg" class="w-6 h-6 mr-2" /><Link href="#">Explore</Link></li>
                <li class="text-white text-lg font-bold flex items-center"><img src="/icons/notifications.svg" class="w-6 h-6 mr-2" /><Link href="#">Notifications</Link></li>
                <li class="text-white text-lg font-bold flex items-center"><img src="/icons/messages.svg" class="w-6 h-6 mr-2" /><Link href="#">Messages</Link></li>
                <li class="text-white text-lg font-bold flex items-center"><img src="/icons/bookmarks.svg" class="w-6 h-6 mr-2" /><Link href="#">Bookmarks</Link></li>
                <li class="text-white text-lg font-bold flex items-center"><img src="/icons/lists.svg" class="w-6 h-6 mr-2" /><Link href="#">Lists</Link></li>
            </ul>
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
                    <a href="#" class="border border-blue-500 text-blue-500 px-4 py-2 rounded-full">Edit profile</a>
                </div>
                <div class="user__block-names border-slate-800 border-b px-4 pb-4">
                    <p class="text-2xl text-white font-bold">John Doe</p>
                    <p class="text-xs text-gray-500 mb-2">@use948823829</p>
                    <p class="text-md text-white">Super puper developer of LaraTweet.</p>
                </div>
            </div>

            <div class="tweets__block">
                
                <div class="tweet__block border-slate-800 border-b flex space-x-4 p-4">
                    <div class="tweet__block-avatar w-1/12">
                        <div class="user__block-avatar h-16 w-16 mb-4 rounded-full bg-cover" style="background-image: url(https://photobest1.com/wp-content/uploads/2018/05/Thailand-Wallpapers-background-HD-04.jpg);"></div>
                    </div>
                    <div class="tweet__block-content w-11/12">
                        <p class="text-lg text-white font-bold">John Doe</p>
                        <p class="text-xs text-gray-500 mb-2">@use948823829</p>
                        <p class="text-md text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur itaque quisquam reiciendis unde delectus aliquam numquam, quam aliquid quod esse hic nam voluptate obcaecati velit nisi expedita molestiae deserunt neque. Perferendis cumque mollitia libero cupiditate dolor aliquam soluta a ex, tempora quaerat porro consequuntur, reiciendis illo doloremque fugiat perspiciatis praesentium.</p>
                    </div>
                </div>
                <div class="tweet__block border-slate-800 border-b flex space-x-4 p-4">
                    <div class="tweet__block-avatar w-1/12">
                        <div class="user__block-avatar h-16 w-16 mb-4 rounded-full bg-cover" style="background-image: url(https://photobest1.com/wp-content/uploads/2018/05/Thailand-Wallpapers-background-HD-04.jpg);"></div>
                    </div>
                    <div class="tweet__block-content w-11/12">
                        <p class="text-lg text-white font-bold">John Doe</p>
                        <p class="text-xs text-gray-500 mb-2">@use948823829</p>
                        <p class="text-md text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur itaque quisquam reiciendis unde delectus aliquam numquam, quam aliquid quod esse hic nam voluptate obcaecati velit nisi expedita molestiae deserunt neque. Perferendis cumque mollitia libero cupiditate dolor aliquam soluta a ex, tempora quaerat porro consequuntur, reiciendis illo doloremque fugiat perspiciatis praesentium.</p>
                    </div>
                </div>
                <div class="tweet__block border-slate-800 border-b flex space-x-4 p-4">
                    <div class="tweet__block-avatar w-1/12">
                        <div class="user__block-avatar h-16 w-16 mb-4 rounded-full bg-cover" style="background-image: url(https://photobest1.com/wp-content/uploads/2018/05/Thailand-Wallpapers-background-HD-04.jpg);"></div>
                    </div>
                    <div class="tweet__block-content w-11/12">
                        <p class="text-lg text-white font-bold">John Doe</p>
                        <p class="text-xs text-gray-500 mb-2">@use948823829</p>
                        <p class="text-md text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur itaque quisquam reiciendis unde delectus aliquam numquam, quam aliquid quod esse hic nam voluptate obcaecati velit nisi expedita molestiae deserunt neque. Perferendis cumque mollitia libero cupiditate dolor aliquam soluta a ex, tempora quaerat porro consequuntur, reiciendis illo doloremque fugiat perspiciatis praesentium.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
    let props = defineProps({
        profile: Object
    });
</script>