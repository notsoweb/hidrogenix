<script setup>
import { goTo, transl } from './Component';
import { Link, useForm } from '@inertiajs/vue3';

import PrimaryButton   from '@/Components/Dashboard/Button/Primary.vue';
import Input           from '@/Components/Dashboard/Form/Input.vue';
import PageHeader      from '@/Components/Dashboard/PageHeader.vue';
import GoogleIcon      from '@/Components/Shared/GoogleIcon.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';

defineProps({
    password: String,
    users: String
});

const form = useForm({
    name: '',
    paternal: '',
    maternal: '',
    email: '',
    phone: '',
    password: ''
});

const submit = () => form.post(route(goTo('store')), {
    onSuccess: () => Notify.success(transl('create.onSuccess')),
    onError:   () => Notify.error(transl('create.onError')),
    onFinish:  () => form.reset('password')
});
</script>

<template>
  <DashboardLayout :title="transl('create.title')">
    <PageHeader>
        <Link :href="route(goTo('index'))">
            <GoogleIcon
                :title="$t('return')"
                class="btn-icon-primary"
                name="arrow_back"
                outline
            />
        </Link>
    </PageHeader>
    <div class="w-full pb-8">
        <div class="mt-8">
            <p
                v-text="transl('create.description')"
            />
      </div>
    </div>
    <div class="w-full">
        <form @submit.prevent="submit" class="grid gap-4 grid-cols-6">
            <Input
                id="name"
                class="col-span-2"
                v-model="form.name"
                :onError="form.errors.name"
                autofocus
                required
            />
            <Input
                id="paternal"
                class="col-span-2"
                v-model="form.paternal"
                :onError="form.errors.paternal"
                autofocus
                required
            />
            <Input
                id="maternal"
                class="col-span-2"
                v-model="form.maternal"
                :onError="form.errors.maternal"
                autofocus
            />
            <Input
                id="phone"
                class="col-span-2"
                v-model="form.phone"
                :onError="form.errors.phone"
                type="number"
                autofocus
                required
            />
            <Input
                id="email.title"
                type="email"
                class="col-span-2"
                v-model="form.email"
                :onError="form.errors.email"
                autofocus
                required
            />
            <Input
                id="password"
                type="password"
                class="col-span-2"
                v-model="form.password"
                :onError="form.errors.password"
                required
            />
            <div class="col-span-6 flex flex-col items-center justify-end space-y-4 mt-4">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }" 
                    :disabled="form.processing"
                    v-text="transl('create.title')"
                />
            </div>
        </form>
    </div>
  </DashboardLayout>
</template>
