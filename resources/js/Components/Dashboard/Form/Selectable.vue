<script setup>
import { computed, ref } from 'vue';
import VueMultiselect from 'vue-multiselect';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    trackBy: {
        default: 'id',
        type: String
    },
    label: {
        default: 'name',
        type: String
    },
    modelValue: String | Number,
    title: String,
    options: Object,
    onError: String,
    placeholder: {
        default: 'Buscar ...',
        type: String
    },
    required: Boolean
});

const multiselect = ref();

const value = computed({
  get() {
    return props.modelValue
  },
  set(value) {
    emit('update:modelValue', value)
  }
})

defineExpose({
    clean: () =>  multiselect.value.removeLastElement()
});
</script>

<template>
    <div class="flex flex-col">
        <label v-if="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            {{title}} <span class="text-red-500" v-if="required">*</span> <slot name="label-icon" />
        </label>
        <VueMultiselect 
            v-model="value"
            ref="multiselect"
            :options="options"
            :close-on-select="true"
            :clear-on-select="false"
            :preserve-search="true"
            selectedLabel="Seleccionado"
            selectLabel="Seleccionar"
            deselectLabel="Remover"
            :placeholder="placeholder"
            :label="label"
            :track-by="trackBy"
            :required="required"
        >
            <template #noOptions>
                {{ $t('noRecords') }}
            </template>
        </VueMultiselect>
        <p v-show="onError" class="text-sm text-red-600">
            {{ onError }}
        </p>
    </div>
</template>