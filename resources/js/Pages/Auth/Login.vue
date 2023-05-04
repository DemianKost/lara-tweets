<template>
    <div class="container mx-auto flex justify-center mt-40">
        <div class="w-1/3">
            
            <img src="/logo.svg" class="w-1/2 mb-8 mx-auto" />

            <form @submit.prevent="login()" class="login__form border border-slate-800 rounded-lg px-6 py-8">
                <h2 class="text-3xl text-white text-center fomt-bold mb-8">Log in to your account</h2>
                <div class="mb-6">
                    <input v-model="form.email" type="email" class="text-white bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 w-full" placeholder="E-mail" />
                    <p v-if="errors.email" class="text-xs text-red-500 mt-2 mb-0">{{ errors.email }}</p>
                </div>
                <div class="mb-6">
                    <input v-model="form.password" type="password" class="text-white bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 w-full" placeholder="Password" autocomplete />
                    <p v-if="errors.password" class="text-xs text-red-500 mt-2 mb-0">{{ errors.password }}</p>
                </div>
                <div class="mb-6">
                    <button type="submit" class="text-white bg-blue-600 border border-blue-500 rounded-lg px-4 py-2 w-full font-bold">Sign In</button>
                </div>
                <p class="text-slate-400">Don't have account yet? <Link href="/register" class="text-blue-500">Sign Up</Link></p>
            </form>

        </div>
    </div>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3';

    let props = defineProps({
        errors: Object
    });

    let form = useForm({
        email: '',
        password: ''
    });

    function login() {
        form.post('/login');
    }
</script>