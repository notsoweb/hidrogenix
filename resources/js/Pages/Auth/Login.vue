<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

import AuthenticationCard from '@/Components/Dashboard/AuthenticationCard.vue';
import PrimaryButton      from '@/Components/Dashboard/Button/Primary.vue';
import Checkbox           from '@/Components/Dashboard/Form/Checkbox.vue';
import Input              from '@/Components/Dashboard/Form/Input.vue';
import AppLogo            from '@/Components/Dashboard/Logo.vue';

defineProps({
    canResetPassword: Boolean,
    status: String
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head
        :title="$t('auth.login')"
    />
    <AuthenticationCard>
        <template #logo>
            <AppLogo
                class="text-2xl"
            />
        </template>

        <div v-if="status"
            class="mb-4 font-medium text-sm text-success"
        >
            {{status}}
        </div>

        <form @submit.prevent="submit" class="space-y-4">
            <Input
                id="email.title"
                type="email"
                v-model="form.email"
                :onError="form.errors.email"
                autofocus
                required
            />
            <Input
                id="password"
                type="password"
                v-model="form.password"
                :onError="form.errors.password"
                required
            />
            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox 
                        name="remember"
                        v-model:checked="form.remember"
                    />
                    <span
                        class="ml-2 text-sm"
                        v-text="$t('auth.remember')"
                    />
                </label>
            </div>
            <div class="flex flex-col items-center justify-end space-y-2 mt-4">
                <PrimaryButton
                    class="w-full"
                    :class="{ 'opacity-25': form.processing }" 
                    :disabled="form.processing"
                    v-text="$t('auth.login')"
                />
                <Link
                    class="w-full"
                    :href="route('register')" 
                >
                    <PrimaryButton
                        class="w-full"
                        :class="{ 'opacity-25': form.processing }" 
                        :disabled="form.processing"
                        v-text="$t('register.signUp')"
                    />
                </Link>
                <Link v-if="canResetPassword"
                    class="underline text-sm" 
                    :href="route('password.request')" 
                >
                    {{ $t('auth.forgotPassword.ask') }}
                </Link>
            </div>
        </form>
    </AuthenticationCard>
</template>
