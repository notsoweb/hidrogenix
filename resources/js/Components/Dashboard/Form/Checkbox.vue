<script setup>
import { computed } from 'vue';

const emit = defineEmits([
    'update:checked'
]);

const props = defineProps({
    checked: {
        default: false,
        type: [
            Array,
            Boolean
        ]
    },
    value: {
        default: null,
        type: String
    }
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>

<template>
    <input
        class="rounded border-gray-300 text-primary shadow-sm focus:border-primary/90 focus:ring focus:ring-primary focus:ring-opacity-50"
        type="checkbox"
        :value="value"
        v-model="proxyChecked"
    >
</template>
