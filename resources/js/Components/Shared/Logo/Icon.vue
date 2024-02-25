<script setup>
import { Link } from '@inertiajs/vue3';

import GoogleIcon from '@/Components/Shared/GoogleIcon.vue';
</script>

<template>
    <Link :href="'/'" class="flex">
        <GoogleIcon
            name="dashboard"
        />
    </Link>
</template>
