<script setup>
import { goTo, transl } from './Component';
import { useForm } from '@inertiajs/vue3';

import PrimaryButton from '@/Components/Dashboard/Button/Primary.vue';
import Input         from '@/Components/Dashboard/Form/Input.vue';
import FormSection   from '@/Components/Dashboard/FormSection.vue';

const props = defineProps({
    user: Object
});

const form = useForm({
    _method: 'POST',
    password: '',
    user_id: props.user.id
});

const updateProfileInformation = () => {
    form.post(route(goTo('password')), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => {
            Notify.success('updated');
            form.reset();
        },
        onError: () => Notify.error(lang('updateFail'))
    });
};
</script>

<template>
    <FormSection @submitted="updateProfileInformation">
        <template #title>
            {{ transl('password.title') }}
        </template>
        <template #description>
            {{ transl('password.description') }}
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-4 space-y-4">
                <Input
                    id="password"
                    title="account.password.new"
                    type="password"
                    v-model="form.password"
                    :onError="form.errors.password"
                    autocomplete="off"
                    required
                />
            </div>
        </template>
        <template #actions>
            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                {{ $t('update') }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
