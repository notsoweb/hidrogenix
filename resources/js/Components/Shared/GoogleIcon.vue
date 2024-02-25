<script setup>
import { computed } from 'vue';

const props = defineProps({
    name:  String,
    outline: Boolean,
    title: String
})

const classes = computed(() => {
    return props.outline
        ? 'font-google-icon-outlined'
        : 'font-google-icon';
});
</script>
<template>
    <button :title="title" type="button">
        <span
            :class="classes"
            translate="no"
            v-text="name"
        />
    </button>
</template>