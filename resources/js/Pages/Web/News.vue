<script setup>
import Feature from '@/Components/Web/Card/Feature.vue';
import Faq from '@/Components/Web/Card/Faq.vue';
import Layout from '@/Layouts/WebLayout.vue';
</script>

<template>
    <Layout>
        <div class="mx-auto container"></div>
        <div class="mx flex flex-col justify-center items-center rounded-md text-white w-full h-80 bg-cover bg-center"
            :style="{ 'background-image': 'url(storage/images/yoga-1.jpg)' }">
            <h4 class="font-bold text-2xl">Artículos y reconocimientos</h4>
            <span>Datos interesantes.</span>
        </div>
        <div class="mx-auto container w-full grid gap-4 grid-cols-1 md:grid-cols-3">
            <div class="flex flex-col p-2 h-64 justify-center items-center rounded-md cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-gray-500 text-white">
                <span class="font-semibold">Articulo 1</span>
            </div>
            <div class="flex flex-col p-2 h-64 justify-center items-center rounded-md cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-gray-500 text-white">
                <span class="font-semibold">Articulo 2</span>
            </div>
            <div class="flex flex-col p-2 h-64 justify-center items-center rounded-md cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-gray-500 text-white">
                <span class="font-semibold">Articulo 3</span>
            </div>
        </div>
</Layout></template>