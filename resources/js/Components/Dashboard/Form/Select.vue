<script setup>
import { ref, computed} from 'vue';

import Error from '@/Components/Dashboard/Form/Elements/Error.vue';
import Label from '@/Components/Dashboard/Form/Elements/Label.vue';

defineEmits([
    'update:modelValue'
]);

const props = defineProps({
    id: String,
    modelValue: String | Number,
    onError: String,
    options: Array,
    required: Boolean,
    title: String,
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
</script>

<template>
    <div class="w-full">
        <Label
            :id="id"
            :required="required"
            :title="autoTitle"
        />
        <select
            :id="id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
            :required="required"
            :value="modelValue"
            v-bind="$attrs"
            @change="$emit('update:modelValue', $event.target.value)"
        >
            <option disabled value="">
                {{ $t('option') }}
            </option>
            <slot />
        </select>
        <Error
            :onError="onError"
        />
    </div>
</template>