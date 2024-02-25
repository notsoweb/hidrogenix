<script setup>
import { Link } from '@inertiajs/vue3';

import GoogleIcon from '@/Components/Shared/GoogleIcon.vue';

const appName = window.appName;
</script>
<template>
    <Link :href="'/'" class="flex space-x-2">
        <GoogleIcon
            :title="appName"
            name="dashboard"
        />
        <span class="uppercase block">
            {{appName}}
        </span>
    </Link>
</template>
