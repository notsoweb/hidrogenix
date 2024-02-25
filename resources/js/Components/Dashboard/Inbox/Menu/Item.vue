<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import GoogleIcon from '@/Components/Shared/GoogleIcon.vue';

const props = defineProps({
    icon: String,
    conter: Number,
    to: String,
    toParam: {
        default: {},
        type: Object 
    },
    title: String,
});

const classes = computed(() => {
    let status = route().current(props.to, props.toParam)
        ? 'bg-secondary dark:bg-secondary-dark bg-opacity-30'
        : 'border-transparent hover:bg-secondary dark:hover:bg-secondary-dark hover:bg-opacity-30';

    return ` text-primary flex items-center justify-between py-1.5 px-4 rounded cursor-pointer ${status} transition`
});

</script>

<template>
    <li>
        <Link v-if="to" :href="route(to, toParam)" :class="classes">
            <span class="flex items-center space-x-2">
                <GoogleIcon 
                class="text-lg"
                    :name="icon"
                    outline
                />
                <span>
                    {{ title }}
                </span>
            </span>
            <span v-if="conter > 0" class="bg-primary dark:bg-primary-dark text-gray-100 font-bold px-2 py-0.5 text-xs rounded-lg">
                {{ conter }}
            </span>
        </Link>
    </li>
</template>