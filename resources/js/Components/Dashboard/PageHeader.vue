<script setup>
import { Link } from '@inertiajs/vue3';
import GoogleIcon from '@/Components/Shared/GoogleIcon.vue';

</script>

<template>
   <div class="flex w-full justify-end py-[0.31rem] border-y-2 border-primary dark:border-main-dark-on">
        <div id="buttons" class="flex items-center space-x-2 text-sm py-0.5">
            <slot />
            <Link :href="route('dashboard.index')">
                <GoogleIcon
                    :title="$t('home')"
                    class="btn-icon-primary"
                    name="home"
                    outline
                />
            </Link>
        </div>
    </div>
</template>