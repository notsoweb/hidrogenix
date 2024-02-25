<script setup>
import DangerButton    from '@/Components/Dashboard/Button/Danger.vue';
import SecondaryButton from '@/Components/Dashboard/Button/Secondary.vue';
import DialogModal     from '@/Components/Dashboard/DialogModal.vue';
    
defineEmits([
    'close',
    'destroy',
]);

defineProps({
    show: Boolean,
    title: {
        default: lang('delete.title'),
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
            <p 
                class="mt-4 text-justify text-danger"
                v-text="$t('delete.confirm')"
            />
        </template>
        <template #footer>
            <div class="space-x-2">
                <slot name="buttons" />
                <DangerButton
                    @click="$emit('destroy')"
                    v-text="$t('delete.title')"
                />
                <SecondaryButton
                    @click="$emit('close')"
                    v-text="$t('cancel')"
                />
            </div>
        </template>
    </DialogModal>
</template>