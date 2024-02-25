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
        class="bg-info"
        :type="type"
    >
        <slot />
    </Base>
</template>
