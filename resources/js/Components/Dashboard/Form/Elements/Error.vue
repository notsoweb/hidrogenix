<script setup>
    defineProps({
        onError: String
    });
</script>

<template>
    <p
        v-if="onError"
        class="text-sm text-danger"
    >
        {{onError}}
    </p>
</template>
