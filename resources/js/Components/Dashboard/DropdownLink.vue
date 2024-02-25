<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    as: String,
    href: String
});

const style = 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition';
</script>

<template>
    <div>
        <button 
            v-if="as == 'button'"
            class="w-full text-left"
            :class="style"
            type="submit"
        >
            <slot />
        </button>

        <a 
            v-else-if="as =='a'"
            :href="href"
            :class="style"
        >
            <slot />
        </a>

        <Link 
            v-else
            :href="href"
            :class="style"
        >
            <slot />
        </Link>
    </div>
</template>
