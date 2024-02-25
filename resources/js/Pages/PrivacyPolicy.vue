<script setup>
import { Head } from '@inertiajs/vue3';

import AppLogoIcon from '@/Components/Shared/Logo/Icon.vue';

defineProps({
    policy: String
});
</script>

<template>
    <Head
        :title="$t('terms.privacy')"
    />

    <div class="font-sans text-gray-900 antialiased">
        <div class="pt-4 bg-gray-100">
            <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                <div>
                    <AppLogoIcon />
                </div>

                <div
                    class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose"
                    v-html="policy"
                />
            </div>
        </div>
    </div>
</template>
