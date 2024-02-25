<script setup>
import { Head, useForm } from '@inertiajs/vue3';

import AuthenticationCard from '@/Components/Dashboard/AuthenticationCard.vue';
import PrimaryButton      from '@/Components/Dashboard/Button/Primary.vue';
import Input              from '@/Components/Dashboard/Form/Input.vue';
import AppLogo            from '@/Components/Dashboard/Logo.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: ''
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head
        :title="$t('auth.forgotPassword.title')" 
    />
    <AuthenticationCard>
        <template #logo>
            <AppLogo
                class="text-2xl"
            />
        </template>

        <div class="mb-4 text-sm">
            {{$t('auth.forgotPassword.description')}}
        </div>
        
        <div v-if="status" class="mb-4 font-medium text-sm text-success">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="flex flex-col space-y-4">
            <div>
                <Input
                    id="email.title"
                    type="email"
                    v-model="form.email"
                    :onError="form.errors.email"
                    autofocus
                    required
                />
            </div>
            <div class="flex items-center justify-end">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    {{$t('auth.forgotPassword.sendLink')}}
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
