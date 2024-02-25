<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

import ActionMessage   from '@/Components/Dashboard/ActionMessage.vue';
import ActionSection   from '@/Components/Dashboard/ActionSection.vue';
import PrimaryButton   from '@/Components/Dashboard/Button/Primary.vue';
import SecondaryButton from '@/Components/Dashboard/Button/Secondary.vue';
import DialogModal     from '@/Components/Dashboard/DialogModal.vue';
import Input           from '@/Components/Dashboard/Form/Input.vue';

defineProps({
    sessions: Array,
});

const confirmingLogout = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: ''
});

const confirmLogout = () => {
    confirmingLogout.value = true;
};

const logoutOtherBrowserSessions = () => {
    form.delete(route('other-browser-sessions.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal();
        },
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset()
    });
};

const closeModal = () => {
    confirmingLogout.value = false;

    form.reset();
};
</script>

<template>
    <ActionSection>
        <template #title>
            {{$t('account.sessions.title')}}
        </template>

        <template #description>
            {{$t('account.sessions.description')}}
        </template>

        <template #content>
            <div class="max-w-xl text-sm">
                {{$t('account.sessions.onLogout')}}
            </div>

            <!-- Other Browser Sessions -->
            <div v-if="sessions.length > 0" class="mt-5 space-y-6">
                <div v-for="(session, i) in sessions" :key="i" class="flex items-center">
                    <div>
                        <svg
                            v-if="session.agent.is_desktop"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="w-8 h-8"
                        >
                            <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>

                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="w-8 h-8"
                        >
                            <path d="M0 0h24v24H0z" stroke="none" /><rect
                                x="7"
                                y="4"
                                width="10"
                                height="16"
                                rx="1"
                            /><path d="M11 5h2M12 17v.01" />
                        </svg>
                    </div>

                    <div class="ml-3">
                        <div class="text-sm">
                            {{ session.agent.platform ? session.agent.platform : $t('unknown') }} - {{ session.agent.browser ? session.agent.browser : $t('unknown') }}
                        </div>

                        <div>
                            <div class="text-xs">
                                {{ session.ip_address }},

                                <span v-if="session.is_current_device" class="text-success font-semibold">
                                    {{$t('account.sessions.this')}}
                                </span>
                                <span v-else>
                                    {{$t('account.sessions.last')}} {{ session.last_active }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center mt-5">
                <PrimaryButton @click="confirmLogout">
                     {{$t('account.sessions.logout')}}
                </PrimaryButton>

                <ActionMessage :on="form.recentlySuccessful" class="ml-3 text-success">
                    {{$t('done')}}
                </ActionMessage>
            </div>

            <!-- Log Out Other Devices Confirmation Modal -->
            <DialogModal :show="confirmingLogout" @close="closeModal">
                <template #title>
                     {{$t('account.sessions.logout')}}
                </template>

                <template #content>
                    {{$t('account.sessions.confirm')}}

                    <Input
                        id="password"
                        class="mt-4"
                        type="password"
                        v-model="form.password"
                        :onError="form.errors.password"
                        required
                    />
                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        {{ $t('cancel') }}
                    </SecondaryButton>

                    <PrimaryButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="logoutOtherBrowserSessions"
                    >
                        {{$t('account.sessions.logout')}}
                    </PrimaryButton>
                </template>
            </DialogModal>
        </template>
    </ActionSection>
</template>
