<script setup>
import { computed, ref } from 'vue';

import Error      from '@/Components/Dashboard/Form/Elements/Error.vue';
import Label      from '@/Components/Dashboard/Form/Elements/Label.vue';
import GoogleIcon from '@/Components/Shared/GoogleIcon.vue';

defineEmits([
    'search'
]);

const props = defineProps({
    class: String,
    id: String,
    onError: String,
    placeholder: {
        type: String,
        default: lang('search')
    },
    required: Boolean,
    title: String
});

const input = ref('');

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
            :title="title"
        />
        <div class="relative mt-1">
            <div 
                class="absolute inset-y-0 right-2 flex items-center pl-3 cursor-pointer text-gray-700 hover:scale-110 hover:text-danger"
                @click="$emit('search', input)"
            >
                <GoogleIcon
                    :title="$t('search')"
                    class="text-xl"
                    name="search"
                />
            </div>
            <input
                id="search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary/90 block w-full pr-10 p-2.5"
                autocomplete="off"
                name="search"
                :placeholder="placeholder"
                required
                type="text"
                v-model="input"
                @keyup.enter="$emit('search', input)"
            >
            <Error
                :onError="onError"
            />
        </div>
    </div>
</template>