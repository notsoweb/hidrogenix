<script setup>
import { onMounted, ref, computed } from 'vue';

import Error from '@/Components/Dashboard/Form/Elements/Error.vue';
import Label from '@/Components/Dashboard/Form/Elements/Label.vue';

defineEmits([
    'update:modelValue'
]);

const props = defineProps({
    id: String,
    modelValue: String | Number,
    onError: String,
    placeholder: String,
    required: Boolean,
    rows: {
        default: 5,
        type: Number
    },
    title: String
});

const autoTitle = computed(() => {
    if(props.title) {
        return props.title;
    }

    return props.id;
});

const input = ref(null);

defineExpose({
    focus: () => input.value.focus()
});

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>

<template>
    <div class="w-full">
        <Label
            :id="id"
            :title="autoTitle"
            :required="required"
        />
        <textarea
            :id="id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary/90 block w-full p-2.5"
            :placeholder="placeholder"
            ref="input"
            :required="required"
            :rows="rows"
            :type="type"
            :value="modelValue"
            v-bind="$attrs"
            @input="$emit('update:modelValue', $event.target.value)"
        ></textarea>
        <Error
            :onError="onError"
        />
    </div>
</template>