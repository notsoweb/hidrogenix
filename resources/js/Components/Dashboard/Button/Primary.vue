<script setup>
import Base from './Base.vue';

defineProps({
    type: {
        default: 'submit',
        type: String
    }
});
</script>

<template>
    <Base
        class="bg-primary dark:bg-primary-dark dark:border-primary-dark-on"
        :type="type"
    >
        <slot />
    </Base>
</template>
