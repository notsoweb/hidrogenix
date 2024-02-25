<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

import GoogleIcon from '@/Components/Shared/GoogleIcon.vue';

const props = defineProps({
    icon: String,
    name: String,
    to: String
});

const classes = computed(() => {
    let status = route().current(props.to)
        ? 'bg-secondary/30 dark:bg-secondary-dark/30 border-secondary'
        : 'border-transparent';

    return `flex items-center h-11 focus:outline-none hover:bg-secondary/30 dark:hover:bg-secondary-dark/30 border-l-4 hover:border-secondary pr-6 ${status} transition`
});
</script>

<template>
    <li>
        <Link :href="route(to)" :class="classes">
            <span 
                v-if="icon"
                class="inline-flex justify-center items-center ml-4 mr-2"
            >
                <GoogleIcon 
                    class="text-xl"
                    :name="icon"
                    outline
                />
            </span>
            <span 
                v-if="name"
                class="text-sm tracking-wide truncate"
            >
                {{$t(name)}}
            </span>
            <slot />
        </Link>
    </li>
</template>
