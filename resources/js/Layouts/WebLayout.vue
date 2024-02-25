<script setup>
import { Link } from '@inertiajs/vue3'

</script>

<template>
    <div class="flex flex-col w-full min-h-screen justify-between bg-white dark:bg-slate-500">
        <div id="main">
            <header class=" bg-primary">
                <div class="mx-auto container flex w-full  py-2 justify-between">
                    <div>
                        <img class="h-14" src="/storage/images/logo-white.png" />
                    </div>
                    <div>
    
                    </div>
                </div>
            </header>
            <ul class="flex justify-center pt-2 items-center space-x-4">
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
                    <Link :href="route('web.products')">
                        Productos
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
            <main class="space-y-2 px-2">
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