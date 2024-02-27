<script setup>
import Feature from '@/Components/Web/Card/Feature.vue';
import Faq from '@/Components/Web/Card/Faq.vue';
import Layout from '@/Layouts/WebLayout.vue';
</script>

<template>
    <Layout>
        <div class="mx-auto container"></div>
        <div class="flex flex-col justify-center items-center rounded-md text-white w-full h-80 bg-cover bg-center"
            :style="{ 'background-image': 'url(storage/images/yoga-1.jpg)' }">
            <h4 class="font-bold text-2xl">FAQS</h4>
            <span>Preguntas frecuentes.</span>
        </div>
       
        <div class="mx-auto container space-y-4 py-4">
            <Faq />
            <Faq />
            <Faq />
            <Faq />
        </div>
</Layout></template>