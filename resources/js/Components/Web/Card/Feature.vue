<script setup>
import GoogleIcon from '@/Components/Shared/GoogleIcon.vue';

defineProps({
    icon: {
        type: String,
        default: 'people'
    },
    outline: Boolean,
    title: String,
    description: String
})
</script>

<template>
    <div class="flex flex-col p-4 justify-center items-center rounded-md border border-primary hover:shadow-xl hover:scale-105 transition-global">
        <GoogleIcon
            class="text-6xl text-primary"
            :name="icon"
            :outline="outline"
        />
        <h4 class="font-bold text-primary">{{ title }}</h4>
        <span class="text-xs">{{ description }}</span>
    </div>
</template>