<script setup>
    defineProps({
        name: String
    });
</script>

<template>
    <ul v-if="$slots['default']">
        <li class="px-5 hidden md:block">
            <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">
                    {{name}}
                </div>
            </div>
        </li>
        <slot />
    </ul>
</template>
