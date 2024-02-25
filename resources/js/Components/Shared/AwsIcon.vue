<script setup>
import { computed } from 'vue';

const props = defineProps({
    name:  String,
    type: {
        default: 'fab',
        type: String
    }
})

const classes = computed(() => {
    return `${props.type} fa-${props.name}`
});
</script>

<template>
    <i :class="classes"></i>
</template>