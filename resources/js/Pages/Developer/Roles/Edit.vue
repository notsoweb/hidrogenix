<script setup>
import { goTo } from './Component';
import { useForm } from '@inertiajs/vue3';

import Input     from '@/Components/Dashboard/Form/Input.vue';
import EditModal from '@/Components/Dashboard/Modal/Edit.vue';
import Header    from '@/Components/Dashboard/Modal/Elements/Header.vue';

const emit = defineEmits([
    'close'
]);

const props = defineProps({
    model: Object,
    show: Boolean
});

const form = useForm(props.model);

const update = (id) => {
    form.transform(data => ({
        ...props.role
    })).put(route(goTo('update'), {id}),{
        preserveScroll: true,
        onSuccess: () => {
            Notify.success(lang('updated'));
            emit('close');
        }
    });
}
</script>

<template>
    <EditModal
        :show="show"
        @update="update(model.id)"
        @close="$emit('close')"
    >
        <Header
            :title="model.name"
        />
        <div class="py-2 border-b">
            <div class="p-4">
                <form>
                    <div class="grid gap-6 mb-6 lg:grid-cols-2">
                        <Input
                            id="name"
                            v-model="model.name"
                            :onError="form.errors.name"
                            required
                        />
                        <Input
                            id="description"
                            v-model="model.description"
                            :onError="form.errors.description"
                            required
                        />
                    </div>
                </form>
            </div>
        </div>
    </EditModal>
</template>