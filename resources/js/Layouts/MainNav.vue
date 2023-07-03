<script setup>

import { Head, Link} from '@inertiajs/vue3';



defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

</script>

<template>
    <Head>
        
        <title>Software de Denuncias</title>
      
    </Head>

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-gradient-to-r from-neutral-50 to-green-500">
        <div class="sm:fixed sm:top-0 sm:left-0 p-6 text-right">
                <img src="img/escudo.png"  width="200" height="300"  alt="escudo de santa cruz de la sierra">
        </div>

        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="font-semibold text-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>

                <Link :href="route('register')" class="ml-4 font-semibold text-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
          
                <slot />

        </div>
    </div>
</template>

