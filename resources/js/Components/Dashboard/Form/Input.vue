<script>
export default {
  inheritAttrs: false
}
</script>

<script setup>
import { computed, onMounted, ref } from 'vue';

import Error from '@/Components/Dashboard/Form/Elements/Error.vue';
import Label from '@/Components/Dashboard/Form/Elements/Label.vue';

defineEmits([
    'update:modelValue'
]);

const props = defineProps({
    class: String,
    id: String,
    modelValue: Number | String,
    onError: String,
    placeholder: String,
    required: Boolean,
    title: String,
    type: {
        default: 'text',
        type: String
    }
});

const input = ref(null);

const autoTitle = computed(() => {
    if(props.title) {
        return props.title;
    }

    return props.id;
});

const classes = computed(() => {
    return `w-full ${props.class}`
});

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
    <div :class="classes">
        <Label
            :id="id"
            :required="required"
            :title="autoTitle"
        />
        <input
            :id="id"
            class="input-primary"
            :placeholder="placeholder"
            ref="input"
            :required="required"
            :type="type"
            :value="modelValue"
            v-bind="$attrs"
            @input="$emit('update:modelValue', $event.target.value)"
        >
        <Error
            :onError="onError"
        />
    </div>
</template>