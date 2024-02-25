<script setup>
import { Head, useForm } from '@inertiajs/vue3';

import AuthenticationCard from '@/Components/Dashboard/AuthenticationCard.vue';
import PrimaryButton      from '@/Components/Dashboard/Button/Primary.vue';
import Input              from '@/Components/Dashboard/Form/Input.vue';
import AppLogo            from '@/Components/Dashboard/Logo.vue';

const props = defineProps({
    email: String,
    token: String
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: ''
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head
        :title="$t('passwordReset')"
    />
    <AuthenticationCard>
        <template #logo>
            <AppLogo
                class="text-2xl"
            />
        </template>
        <form @submit.prevent="submit" class="space-y-4">
            <Input
                id="email.title"
                type="email"
                class="mt-1 block w-full"
                v-model="form.email"
                :onError="form.errors.email"
                required
                autofocus
            />
            <Input
                id="password"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password"
                :onError="form.errors.password"
                required
                autofocus
            />
            <Input
                id="passwordConfirmation"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password_confirmation"
                :onError="form.errors.password_confirmation"
                required
                autofocus
            />
            <div class="flex items-center justify-end mt-4">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    v-text="$t('account.password.reset')"
                />
            </div>
        </form>
    </AuthenticationCard>
</template>
