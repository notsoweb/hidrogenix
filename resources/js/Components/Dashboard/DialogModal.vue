<script setup>
import Modal from './Modal.vue';

const emit = defineEmits([
    'close'
]);

defineProps({
    closeable: {
        default: true,
        type: Boolean
    },
    maxWidth: {
        default: '2xl',
        type: String
    },
    show: {
        default: false,
        type: Boolean
    }
});

const close = () => {
    emit('close');
};
</script>

<template>
    <Modal
        :show="show"
        :max-width="maxWidth"
        :closeable="closeable"
        @close="close"
    >
        <div class="px-6 py-4">
            <div class="text-lg">
                <slot name="title" />
            </div>
            <div class="mt-4">
                <slot name="content" />
            </div>
        </div>
        <div class="flex flex-row justify-end px-6 py-4 bg-main dark:bg-main-dark text-right">
            <slot name="footer" />
        </div>
    </Modal>
</template>
