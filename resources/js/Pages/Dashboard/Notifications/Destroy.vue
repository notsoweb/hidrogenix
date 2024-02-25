<script setup>
import { useForm } from '@inertiajs/vue3';

import DestroyModal from '@/Components/Dashboard/Modal/Destroy.vue';

const emit = defineEmits([
    'close', 
    'switchModal'
]);

const props = defineProps({
    notification: Object,
    show: Boolean
});

const form = useForm({});

const destroy = (id) => {
    form.delete(route('dashboard.notifications.destroy', {id}),{
        preserveScroll: true,
        onSuccess: () => {
            props.notification.pop;
            emit('close');
            Notify.success(lang('notifications.deleted'));
        },
        onError: () => {
            Notify.info(lang('notifications.notFound'));
            emit('close');
        }
    });
}
</script>

<template>
    <DestroyModal
        :show="show"
        @close="$emit('close')"
        @destroy="destroy(notification.id)"
    >
        <div class="w-full right-0 mt-2">
            <div class="bg-white rounded overflow-hidden shadow-lg">
                <div class="text-center p-6 bg-primary dark:bg-primary-dark border-b">
                    <p class="pt-2 text-lg font-bold text-gray-50">
                        {{notification.data.message}}
                    </p>
                </div>
            </div>
        </div>
    </DestroyModal>
</template>