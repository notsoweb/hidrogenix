<script setup>
import Title  from '@/Components/Web/Card/Transparent.vue';
import Layout from '@/Layouts/WebLayout.vue';
</script>

<template>
    <Layout>
        <div class="mx-auto container"></div>
        <div
            class="mx flex flex-col justify-center items-center rounded-md text-white w-full h-80 bg-cover bg-center"
            :style="{ 'background-image': 'url(storage/images/yoga-1.jpg)' }"
        >
            <Title>
                <h4 class="font-bold text-2xl">HIDRÓGENO MOLECULAR</h4>
            </Title>
        </div>
        <div class="mx-auto container w-full grid gap-4 grid-cols-1 md:grid-cols-3">
            <div class="flex flex-col p-2 h-64 justify-center items-center rounded-md cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-gray-500 text-white">
                <span class="font-semibold">Investigación en animales</span>
            </div>
            <div class="flex flex-col p-2 h-64 justify-center items-center rounded-md cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-gray-500 text-white">
                <span class="font-semibold">Investigación en humanos</span>
            </div>
            <div class="flex flex-col p-2 h-64 justify-center items-center rounded-md cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-gray-500 text-white">
                <span class="font-semibold">Otros</span>
            </div>
        </div>
    </Layout>
</template>