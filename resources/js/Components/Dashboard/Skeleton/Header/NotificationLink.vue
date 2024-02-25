<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

import GoogleIcon from '@/Components/Shared/GoogleIcon.vue';

const props = defineProps({
    as: String,
    href: String,
    icon: {
        default: 'notifications_active',
        type: String
    },
    readAt: String
});

const classes = computed(()=> {
    return 'inline-flex space-x-2 w-full px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition';
});

const readed = computed(()=> {
    return (props.readAt)
        ? 'text-primary'
        : 'text-warning';
});
</script>

<template>
    <div>
        <button
            v-if="as == 'button'"
            :class="classes"
            type="button"
        >
            <GoogleIcon 
                :class="readed"
                :name="icon"
            />
            <slot />
        </button>

        <a
            v-else-if="as =='a'" 
            :class="classes"
            :href="href"
        >
            <GoogleIcon
                :class="readed"
                :name="icon"
            />
            <slot />
        </a>
        
        <Link
            v-else
            :class="classes"
            :href="href"
        >
            <GoogleIcon
                class="text-primary hover:text-secondary"
                :class="readed"
                :name="icon"
            />
            <slot />
        </Link>
    </div>
</template>
