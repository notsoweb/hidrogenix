<script setup>
import { goTo } from './Component';
import { useForm } from '@inertiajs/vue3';

import DestroyModal from '@/Components/Dashboard/Modal/Destroy.vue';
import Header       from '@/Components/Dashboard/Modal/Elements/Header.vue';

const emit = defineEmits([
    'close', 
    'switchModal'
]);

const props = defineProps({
    model: Object,
    show: Boolean
});

const form = useForm(props.model);

const destroy = (id) => {
    form.delete(route(goTo('destroy'), {id}),{
        preserveScroll: true,
        onSuccess: () => {
            props.model.pop;
            emit('close');
            Notify.success(lang('roles.deleted'));
        },
        onError: () => {
            Notify.info(lang('roles.notFound'));
            emit('close');
        }
    });
}
</script>

<template>
    <DestroyModal
        :show="show"
        @destroy="destroy(model.id)"
        @close="$emit('close')"
    >
        <Header
            :title="model.name"
        />
    </DestroyModal>
</template>