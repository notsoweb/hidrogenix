<script setup>
import { onMounted, ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import { hasPermission } from "@/rolePermission.js";

import Header  from '@/Components/Dashboard/Skeleton/Header.vue';
import Sidebar from '@/Components/Dashboard/Skeleton/Sidebar.vue';
import Link    from '@/Components/Dashboard/Skeleton/Sidebar/Link.vue';
import Section from '@/Components/Dashboard/Skeleton/Sidebar/Section.vue';

defineProps({
    title: String,
    titlePage: {
        default: true,
        type: Boolean
    }
});

const sidebar = (TwScreen.isDevice('phone')) 
    ? ref(true)
    : sessionFresh.getSidebar();

const openSidebar = () => {
    sidebar.value = !sidebar.value;
}

onMounted(()=> {
    if (!sessionFresh.isLayoutInitialized()) {
        sessionFresh.startLayout();
    }
});
</script>

<template>
    <Head
        :title="title"
    />
    <div class="flex w-full h-screen">
        <div 
            id="sidebar"
            class="fixed w-fit p-2 rounded-full h-screen transition-all duration-300 z-10"
            :class="{'-translate-x-64 md:-translate-x-0':sidebar, '-translate-x-0 md:-translate-x-64':!sidebar}"
        >
            <Sidebar
                :sidebar="sidebar"
                @open="openSidebar"
            >
                <Section name="Principal">
                    <Link 
                        icon="home"
                        name="home" 
                        to="examples.index"
                    />
                </Section>
            </Sidebar>
        </div>
        <div 
            class="flex flex-col w-full transition-all duration-300"
            :class="{'md:w-[calc(100vw-rem)] md:ml-64':sidebar, 'md:w-screen md:ml-0':!sidebar}"
        >
            <div class="h-2 md:h-14">
                <Header
                    :sidebar="sidebar"
                    @open="openSidebar"
                />
            </div>
            <main id="page" class="flex h-full justify-center md:p-2">
                <div  class="mt-14 md:mt-0 w-full shadow-lg h-fit md:h-[calc(100vh-4.5rem)] px-2 md:px-8 pb-4 sm:px-6 lg:px-8 md:rounded-lg bg-main text-main-on dark:bg-main-dark dark:text-main-dark-on lg:py-4 md:overflow-y-auto md:overflow-x-auto">
                    <div v-if="titlePage" class="flex w-full justify-center pt-4 lg:pt-0">
                        <h2
                            class="font-bold text-xl uppercase"
                            v-text="title"
                        />
                    </div>
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>
