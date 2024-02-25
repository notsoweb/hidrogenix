<script setup>
    defineProps({
        type: {
            default: 'submit',
            type: String
        }
    });
</script>

<template>
    <button 
        class="inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:opacity-90 focus:outline-none active:saturate-150 disabled:opacity-25 transition"
        :type="type"
    >
        <slot />
    </button>
</template>
