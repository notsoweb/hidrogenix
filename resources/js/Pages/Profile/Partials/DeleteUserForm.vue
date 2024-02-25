<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

import ActionSection   from '@/Components/Dashboard/ActionSection.vue';
import DangerButton    from '@/Components/Dashboard/Button/Danger.vue';
import SecondaryButton from '@/Components/Dashboard/Button/Secondary.vue';
import DialogModal     from '@/Components/Dashboard/DialogModal.vue';
import Input           from '@/Components/Dashboard/Form/Input.vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: ''
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const deleteUser = () => {
    form.delete(route('current-user.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset()
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <ActionSection>
        <template #title>
            {{$t('account.delete.title')}}
        </template>

        <template #description>
            {{$t('account.delete.description')}}
        </template>

        <template #content>
            <div class="max-w-xl text-sm">
                {{$t('account.delete.onDelete')}}
            </div>

            <div class="mt-5">
                <DangerButton @click="confirmUserDeletion">
                    {{$t('account.delete.title')}}
                </DangerButton>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <DialogModal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    {{$t('account.delete.title')}}
                </template>

                <template #content>
                    {{$t('account.delete.confirm')}}

                    <div class="mt-4">
                        <Input
                            id="password"
                            type="password"
                            ref="passwordInput"
                            v-model="form.password"
                            :onError="form.errors.password"
                            required
                        />
                    </div>
                </template>
                <template #footer>
                    <SecondaryButton @click="closeModal">
                         {{$t('cancel')}}
                    </SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        {{$t('account.delete.title')}}
                    </DangerButton>
                </template>
            </DialogModal>
        </template>
    </ActionSection>
</template>
