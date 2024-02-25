<script setup>
import { transl, goTo } from './Component'
import { router } from '@inertiajs/vue3';

import DestroyModal from '@/Components/Dashboard/Modal/Destroy.vue';
import Header       from '@/Components/Dashboard/Modal/Elements/Header.vue';

const emit = defineEmits([
    'close', 
    'switchModal'
]);

const props = defineProps({
    show: Boolean,
    model: Object
});

const destroy = (id) => router.delete(route(goTo('destroy'), {id}), {
    preserveScroll: true,
    onSuccess: () => {
        props.model.pop;
        Notify.success(transl('deleted'));
        emit('close');
    },
    onError: () => {
        Notify.info(transl('notFound'));
        emit('close');
    }
});
</script>

<template>
    <DestroyModal
        :show="show"
        @close="$emit('close')"
        @destroy="destroy(model.id)"
    >
        <Header
            :title="model.name"
            :subtitle="model.full_last_name"
        />
    </DestroyModal>
</template>