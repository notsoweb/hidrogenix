<script setup>
import Title  from '@/Components/Web/Card/Transparent.vue';
import Layout from '@/Layouts/WebLayout.vue';
</script>

<template>
    <Layout>
        <div class="mx-auto container"></div>
        <div
            class="mx flex flex-col justify-center items-center rounded-md text-white w-full h-80 bg-cover bg-center"
            :style="{ 'background-image': 'url(/storage/images/investigacion.jpg)' }"
        >
            <Title>
                <h4 class="font-bold text-2xl">Investigación científica</h4>
            </Title>
        </div>
        <div class="mx-auto container w-full grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
            <a
                class="flex flex-col p-2 h-64 justify-center items-center rounded-xl cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-center bg-cover shadow-xl"
                style="background-image: url(/storage/images/investigacion-1.jpg);"
                href="https://doi.org/10.3390/molecules28237785"
                target="_blank"
            >
                <span class="font-semibold flex flex-col bg-gray-500/20 text-white backdrop-blur-sm p-4 rounded-md">
                    Investigación en humanos
                </span>
            </a>
            <a
                class="flex flex-col p-2 h-64 justify-center items-center rounded-xl cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-center bg-cover shadow-xl"
                style="background-image: url(/storage/images/investigacion-2.jpg);"
                href="https://doi.org/10.4103/2045-9912.290003"
                target="_blank"
            >
                <span class="font-semibold flex flex-col bg-gray-500/20 text-white backdrop-blur-sm p-4 rounded-md">
                    Cancer
                </span>
            </a>
            <a
                class="flex flex-col p-2 h-64 justify-center items-center rounded-xl cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-center bg-cover shadow-xl"
                style="background-image: url(/storage/images/investigacion-3.jpg);"
                href="https://doi.org/10.1186/2045-9912-2-21"
                target="_blank"
            >
                <span class="font-semibold flex flex-col bg-gray-500/20 text-white backdrop-blur-sm p-4 rounded-md">
                    Cerebro
                </span>
            </a>
            <a
                class="flex flex-col p-2 h-64 justify-center items-center rounded-xl cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-center bg-cover shadow-xl"
                style="background-image: url(/storage/images/investigacion-4.jpg);"
                href="https://doi.org/10.1253/circj.CJ-16-0127"
                target="_blank"
            >
                <span class="font-semibold flex flex-col bg-gray-500/20 text-white backdrop-blur-sm p-4 rounded-md">
                    Corazón
                </span>
            </a>
            <a
                class="flex flex-col p-2 h-64 justify-center items-center rounded-xl cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-center bg-cover shadow-xl"
                style="background-image: url(/storage/images/investigacion-5.jpg);"
                href="#"
            >
                <span class="font-semibold flex flex-col bg-gray-500/20 text-white backdrop-blur-sm p-4 rounded-md">
                    Pulmones
                </span>
            </a>
            <a
                class="flex flex-col p-2 h-64 justify-center items-center rounded-xl cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-center bg-cover shadow-xl"
                style="background-image: url(/storage/images/investigacion-6.jpg);"
                href="#"
            >
                <span class="font-semibold flex flex-col bg-gray-500/20 text-white backdrop-blur-sm p-4 rounded-md">
                    Piel
                </span>
            </a>
            <a
                class="flex flex-col p-2 h-64 justify-center items-center rounded-xl cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-center bg-cover shadow-xl"
                style="background-image: url(/storage/images/investigacion-7.jpg);"
                href="#"
            >
                <span class="font-semibold flex flex-col bg-gray-500/20 text-white backdrop-blur-sm p-4 rounded-md">
                    Ojos
                </span>
            </a>
            <a
                class="flex flex-col p-2 h-64 justify-center items-center rounded-xl cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-center bg-cover shadow-xl"
                style="background-image: url(/storage/images/investigacion-8.jpg);"
                href="https://doi.org/10.1253/circj.CJ-16-0127"
                target="_blank"
            >
                <span class="font-semibold flex flex-col bg-gray-500/20 text-white backdrop-blur-sm p-4 rounded-md">
                    Otros
                </span>
            </a>
        </div>
    </Layout>
</template>