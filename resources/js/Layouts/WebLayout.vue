<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'

import GoogleIcon      from '@/Components/Shared/GoogleIcon.vue';

const menu = ref(false);

</script>

<template>
    <div class="flex flex-col w-full min-h-screen justify-between bg-white dark:bg-slate-500">
        <div id="main">
            <header class="px-2  bg-primary">
                <div class="mx-auto container flex w-full  py-2 justify-between items-center">
                    <div>
                        <img class="h-14" src="/storage/images/logo-white.png" />
                    </div>
                    <div @click="menu = !menu">
                        <GoogleIcon name="menu" class="text-white text-2xl" />
                    </div>
                </div>
            </header>
            <ul 
                v-show="menu"
                class="flex flex-col md:flex-row w-full justify-center pt-2 items-center space-x-4 overflow-x-auto overflow-hidden"
                :class="{'':menu}"
            >
                <li class="font-bold uppercase text-sm text-primary hover:underline">
                    <Link :href="route('web.index')">
                        Inicio
                    </Link>
                </li>
                <li class="font-bold uppercase text-sm text-primary hover:underline">
                    <Link :href="route('web.about')">
                        Nosotros
                    </Link>
                </li>
                <li class="font-bold uppercase text-sm text-primary hover:underline">
                    <a target="_blank" href="https://hidrogenix.shop.com">
                        Productos
                    </a>
                </li>
                <li class="font-bold uppercase text-sm text-primary hover:underline">
                    <Link :href="route('web.research')">
                        Investigaciones
                    </Link>
                </li>
                <li class="font-bold uppercase text-sm text-primary hover:underline">
                    <Link :href="route('web.faqs')">
                        Faqs
                    </Link>
                </li>
                <li class="font-bold uppercase text-sm text-primary hover:underline">
                    <Link :href="route('web.news')">
                        Noticias
                    </Link>
                </li>
                <li class="font-bold uppercase text-sm text-primary hover:underline">
                    <Link :href="route('web.contact')">
                        Contacto
                    </Link>
                </li>
            </ul>
            <main class="space-y-2 px-2 pb-4">
                <slot />
            </main>
        </div>
        <footer class="bg-primary text-white">
            <div class="mx-auto container flex flex-col md:flex-row justify-between">
                <span> &copy; 2024 Hidrogenix</span>
                <span> Desarrollado por <b>NOTSOWEB</b></span>
            </div>
        </footer>
        
    </div>
</template>