<script setup>
defineProps({
    text: String,
    type: {
        default: 'ADD',
        type: String
    }
});
</script>

<template>
<li><b>{{ type }}:</b> {{ text }}</li>
</template>