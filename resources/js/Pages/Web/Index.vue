<script setup>
import { Link } from '@inertiajs/vue3'

import Feature from '@/Components/Web/Card/Feature.vue';
import New  from '@/Components/Web/Card/New.vue';
import Layout  from '@/Layouts/WebLayout.vue';
</script>

<template>
    <Layout>
        <div class="mx-auto container"></div>
        <div class="flex flex-col justify-center items-center rounded-md text-white w-full h-80 bg-cover" :style="{'background-image':'url(storage/images/moleculas.jpg)'}">
            <h4 class="font-bold text-3xl">HIDROGENIX</h4>
            <span>Donde la innovación se encuentra con el bienestar.</span>
        </div>
        <div class="mx-auto container py-4 grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
            <Link :href="route('web.research')">
                <Feature title="Investigación científica" icon="biotech" outline/>
            </Link>
            <Link :href="route('web.news')">
                <Feature title="Artículos y reconocimientos" icon="receipt_long" outline />
            </Link>
            <Link :href="route('web.testimonial')">
                <Feature title="Casos de éxito" icon="volunteer_activism" outline />
            </Link>
            <Feature title="Blog" icon="newspaper"  outline />
        </div>
        <div class="mx-auto container flex flex-col justify-center items-center space-y-4 py-8">
            <h4 class="font-thin text-center text-3xl text-primary">¿Que es el hidrógeno molecular?</h4>
            <p class="font-thin text-center max-w-4xl">
                El hidrógeno molecular (H2) es la molécula más pequeña, simple y abundante del universo y está compuesta de dos átomos de hidrógeno.
                Tiene una alta biodisponibilidad; Es decir, tiene una alta velocidad y facilidad con la cual es absorbido y alcanza su punto de acción
                en nuestro cuerpo.
            </p>
        </div>
        
        <div class="mx-auto container grid gap-4 grid-cols-1 md:grid-cols-2">
            <div>
                <div class="mx-auto container md:col-span-2 lg:col-span-6">
                    <h4 class="font-thin  text-3xl text-primary">Noticias y artículos</h4>
                </div>
                <div class="w-full space-y-2 overflow-y-auto h-80 md:pr-2 pb-2">
                    <New />
                    <New />
                    <New />
                </div>
            </div>
            <div class="py-4">
                <iframe 
                    width="100%"
                    height="100%" src="https://www.youtube.com/embed/yuxS6hbxf-w" title="USO DE TU MÁQUINA DE HIDRÓGENO MOLECULAR" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen
                ></iframe>
            </div>
        </div>
    </Layout>
</template>