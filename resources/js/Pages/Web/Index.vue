<script setup>
import { Link } from '@inertiajs/vue3'

import Feature from '@/Components/Web/Card/Feature.vue';
import Title   from '@/Components/Web/Card/Transparent.vue';
import Layout  from '@/Layouts/WebLayout.vue';
</script>

<template>
    <Layout>
        <div class="mx-auto container"></div>
        <div class="flex flex-col justify-center items-center rounded-md text-white w-full h-80 backdrop-brightness-50 bg-cover" :style="{'background-image':'url(storage/images/moleculas.jpg)'}">
            <Title>
                <h4 class="font-bold text-3xl text-center">HIDROGENIX</h4>
                <span class="w-full text-center">Donde la innovación se encuentra con el bienestar</span>
            </Title>
        </div>
        <div class="mx-auto container py-4 grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <Link :href="route('web.research')">
                <Feature title="Investigación científica" icon="biotech" outline/>
            </Link>
            <Link :href="route('web.news')">
                <Feature title="Artículos y reconocimientos" icon="receipt_long" outline />
            </Link>
            <Link :href="route('web.testimonial')">
                <Feature title="Casos de éxito y testimonios" icon="volunteer_activism" outline />
            </Link>
        </div>
        <div class="mx-auto container flex justify-center">
            <div class="w-full h-72 max-w-lg">
                <iframe 
                    width="100%"
                    height="100%" src="https://www.youtube.com/embed/5O6lYL60Ad0" title="USO DE TU MÁQUINA DE HIDRÓGENO MOLECULAR" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen
                ></iframe>
            </div>
        </div>
    </Layout>
</template>