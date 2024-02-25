<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

import GoogleIcon from '@/Components/Shared/GoogleIcon.vue';

const props = defineProps({
    icon: String,
    to: String,
    title: String,
    type: {
        default: 'primary',
        type: String
    }
});

const classes = computed(() => {
    return `inbox-menu-button-${props.type}`;
});

</script>

<template>
    <div class="h-16 flex items-center pr-2">
        <Link :href="route(to)" :class="classes">
            <span class="flex items-center space-x-2 ">
                <GoogleIcon 
                    class="text-lg text-white font-bold"
                    :name="icon"
                    outline
                />
                <span>
                    {{ title }}
                </span>
            </span>
        </Link>
    </div>
</template>