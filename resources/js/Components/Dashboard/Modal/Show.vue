<script setup>
import SecondaryButton from '@/Components/Dashboard/Button/Secondary.vue';
import DialogModal     from '@/Components/Dashboard/DialogModal.vue';
    
const emit = defineEmits([
    'close',
    'edit'
]);

const props = defineProps({
    editable: Boolean,
    show: Boolean,
    title: {
        default: lang('details'),
        type: String
    }
});
</script>

<template>
    <DialogModal :show="show">
        <template #title>
            <p
                class="font-bold text-xl"
                v-text="title"
            />
        </template>
        <template #content>
            <div class="w-full right-0 mt-2">
                <div class="rounded overflow-hidden shadow-lg">
                    <slot />
                </div>
            </div>
        </template>
        <template #footer>
            <div class="space-x-2">
                <slot name="buttons" />
                <SecondaryButton 
                    v-if="editable"
                    @click="$emit('edit')"
                    v-text="$t('update')"
                />
                <SecondaryButton
                    @click="$emit('close')" 
                    v-text="$t('close')"
                />
            </div>
        </template>
    </DialogModal>
</template>