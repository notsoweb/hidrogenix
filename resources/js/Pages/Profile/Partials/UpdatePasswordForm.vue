<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

import ActionMessage from '@/Components/Dashboard/ActionMessage.vue';
import PrimaryButton from '@/Components/Dashboard/Button/Primary.vue';
import Input         from '@/Components/Dashboard/Form/Input.vue';
import FormSection   from '@/Components/Dashboard/FormSection.vue';

const currentPasswordInput = ref(null);
const passwordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('user-password.update'), {
        errorBag: 'updatePassword',
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
        },
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }

            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <FormSection @submitted="updatePassword">
        <template #title>
             {{$t('account.password.update')}}
        </template>
        <template #description>
             {{$t('account.password.description')}}
        </template>
        <template #form>
            <Input
                id="passwordCurrent"
                class="col-span-6"
                ref="currentPasswordInput"
                type="password"
                v-model="form.current_password"
                :onError="form.errors.current_password"
                required
            />
            <Input
                id="password"
                class="col-span-6"
                title="account.password.new"
                ref="passwordInput"
                type="password"
                v-model="form.password"
                :onError="form.errors.password"
                required
            />
            <Input
                id="passwordConfirmation"
                class="col-span-6"
                type="password"
                v-model="form.password_confirmation"
                :onError="form.errors.password_confirmation"
                required
            />
        </template>

        <template #actions>
            <ActionMessage
                class="mr-3"
                :on="form.recentlySuccessful"
            >
                {{$t('saved')}}
            </ActionMessage>
            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                {{$t('save')}}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
