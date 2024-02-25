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
        class="bg-warning"
        :type="type"
    >
        <slot />
    </Base>
</template>
