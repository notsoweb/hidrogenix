<script setup>
import { Link } from '@inertiajs/vue3'

import Title  from '@/Components/Web/Card/Transparent.vue';
import Layout from '@/Layouts/WebLayout.vue';
</script>

<template>
    <Layout>
        <div class="mx-auto container"></div>
        <div
            class="mx flex flex-col justify-center items-center rounded-md text-white w-full h-80 bg-cover bg-center"
            :style="{ 'background-image': 'url(/storage/images/productos.png)' }"
        >
            <Title>
                <h4 class="font-bold text-2xl">Productos</h4>
            </Title>
        </div>
        <div class="mx-auto container w-full grid gap-4 grid-cols-1 md:grid-cols-2">
            <Link
                class="flex flex-col p-2 h-64 justify-center items-center rounded-md cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-center bg-cover shadow-xl"
                style="background-image: url(/storage/images/aquacure.jpg);"
                :href="route('web.products.aquacure')"
            >
                <span class="font-semibold flex flex-col bg-gray-500/20 text-white backdrop-blur-sm p-4 rounded-md">AquaCure</span>
            </Link>
            <Link
                class="flex flex-col p-2 h-64 justify-center items-center rounded-md cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-center bg-cover shadow-xl"
                style="background-image: url(/storage/images/canulas.jpg);"
                :href="route('web.products.canula')"
            >
                <span class="font-semibold flex flex-col bg-gray-500/20 text-white backdrop-blur-sm p-4 rounded-md">Cánulas Nasales</span>
            </Link>
        </div>
</Layout></template>