<script setup>
import { ref, computed, watch } from 'vue';
import { router, useForm, usePage } from '@inertiajs/vue3';

import ActionSection    from '@/Components/Dashboard/ActionSection.vue';
import DangerButton     from '@/Components/Dashboard/Button/Danger.vue';
import SecondaryButton  from '@/Components/Dashboard/Button/Secondary.vue';
import PrimaryButton    from '@/Components/Dashboard/Button/Primary.vue';
import ConfirmsPassword from '@/Components/Dashboard/ConfirmsPassword.vue';
import Input            from '@/Components/Dashboard/Form/Input.vue';

const props = defineProps({
    requiresConfirmation: Boolean,
});

const confirming = ref(false);
const enabling = ref(false);
const disabling = ref(false);
const qrCode = ref(null);
const recoveryCodes = ref([]);
const setupKey = ref(null);

const confirmationForm = useForm({
    code: '',
});

const twoFactorEnabled = computed(
    () => ! enabling.value && usePage().props.user?.two_factor_enabled,
);

watch(twoFactorEnabled, () => {
    if (! twoFactorEnabled.value) {
        confirmationForm.reset();
        confirmationForm.clearErrors();
    }
});

const enableTwoFactorAuthentication = () => {
    enabling.value = true;

    router.post('/user/two-factor-authentication', {}, {
        preserveScroll: true,
        onSuccess: () => Promise.all([
            showQrCode(),
            showSetupKey(),
            showRecoveryCodes(),
        ]),
        onFinish: () => {
            enabling.value = false;
            confirming.value = props.requiresConfirmation;
        }
    });
};

const showQrCode = () => {
    return axios.get('/user/two-factor-qr-code').then(response => {
        qrCode.value = response.data.svg;
    });
};

const showSetupKey = () => {
    return axios.get('/user/two-factor-secret-key').then(response => {
        setupKey.value = response.data.secretKey;
    });
}

const showRecoveryCodes = () => {
    return axios.get('/user/two-factor-recovery-codes').then(response => {
        recoveryCodes.value = response.data;
    });
};

const confirmTwoFactorAuthentication = () => {
    confirmationForm.post('/user/confirmed-two-factor-authentication', {
        errorBag: "confirmTwoFactorAuthentication",
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            confirming.value = false;
            qrCode.value = null;
            setupKey.value = null;
        },
    });
};

const regenerateRecoveryCodes = () => {
    axios
        .post('/user/two-factor-recovery-codes')
        .then(() => showRecoveryCodes());
};

const disableTwoFactorAuthentication = () => {
    disabling.value = true;

    router.delete('/user/two-factor-authentication', {
        preserveScroll: true,
        onSuccess: () => {
            disabling.value = false;
            confirming.value = false;
        }
    });
};
</script>

<template>
    <ActionSection>
        <template #title>
            {{$t('account.twoFactor.title')}}
        </template>
        <template #description>
            {{$t('account.twoFactor.description')}}
        </template>
        <template #content>
            <h3 v-if="twoFactorEnabled && ! confirming" class="text-lg font-medium">
                {{$t('account.twoFactor.isEnable')}}
            </h3>
            <h3 v-else-if="twoFactorEnabled && confirming" class="text-lg font-medium">
                {{$t('account.twoFactor.onFinish')}}
            </h3>
            <h3 v-else class="text-lg font-medium">
                {{$t('account.twoFactor.isNotEnable.title')}}
            </h3>
            <div class="mt-3 max-w-xl text-sm">
                <p>
                    {{$t('account.twoFactor.isNotEnable.description')}}
                </p>
            </div>
            <div v-if="twoFactorEnabled">
                <div v-if="qrCode">
                    <div class="mt-4 max-w-xl text-sm">
                        <p v-if="confirming" class="font-semibold">
                            {{$t('account.twoFactor.qr.onConfirmed')}}
                        </p>
                        <p v-else>
                            {{$t('account.twoFactor.qr.isConfirmed')}}
                        </p>
                    </div>
                    <div class="mt-4 p-2 bg-white w-fit" v-html="qrCode" />
                    <div class="mt-4 max-w-xl text-sm" v-if="setupKey">
                        <p class="font-semibold">
                            {{$t('account.twoFactor.key')}}: <span v-html="setupKey"></span>
                        </p>
                    </div>
                    <div v-if="confirming" class="mt-4">
                        <Input
                            id="code"
                            v-model="confirmationForm.code"
                            :onError="confirmationForm.errors.code"
                            class="block mt-1 w-full"
                            inputmode="numeric"
                            autofocus
                            @keyup.enter="confirmTwoFactorAuthentication"
                        />
                    </div>
                </div>
                <div v-if="recoveryCodes.length > 0 && ! confirming">
                    <div class="mt-4 max-w-xl text-sm">
                        <p class="font-semibold">
                            {{$t('account.twoFactor.codes.store')}}
                        </p>
                    </div>
                    <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm rounded-lg">
                        <div v-for="code in recoveryCodes" :key="code">
                            {{ code }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div v-if="! twoFactorEnabled">
                    <ConfirmsPassword @confirmed="enableTwoFactorAuthentication">
                        <PrimaryButton
                            :class="{ 'opacity-25': enabling }"
                            :disabled="enabling"
                            type="button"
                        >
                            {{$t('enable')}}
                        </PrimaryButton>
                    </ConfirmsPassword>
                </div>
                <div v-else>
                    <ConfirmsPassword @confirmed="confirmTwoFactorAuthentication">
                        <PrimaryButton
                            v-if="confirming"
                            type="button"
                            class="mr-3"
                            :class="{ 'opacity-25': enabling }"
                            :disabled="enabling"
                        >
                            {{$t('confirm')}}
                        </PrimaryButton>
                    </ConfirmsPassword>
                    <ConfirmsPassword @confirmed="regenerateRecoveryCodes">
                        <SecondaryButton
                            v-if="recoveryCodes.length > 0 && ! confirming"
                            class="mr-3"
                        >
                            {{$t('account.twoFactor.codes.regenerate')}}
                        </SecondaryButton>
                    </ConfirmsPassword>
                    <ConfirmsPassword @confirmed="showRecoveryCodes">
                        <SecondaryButton
                            v-if="recoveryCodes.length === 0 && ! confirming"
                            class="mr-3"
                        >
                            {{$t('account.twoFactor.codes.show')}}
                        </SecondaryButton>
                    </ConfirmsPassword>
                    <ConfirmsPassword @confirmed="disableTwoFactorAuthentication">
                        <SecondaryButton
                            v-if="confirming"
                            :class="{ 'opacity-25': disabling }"
                            :disabled="disabling"
                        >
                             {{$t('cancel')}}
                        </SecondaryButton>
                    </ConfirmsPassword>
                    <ConfirmsPassword @confirmed="disableTwoFactorAuthentication">
                        <DangerButton
                            v-if="! confirming"
                            :class="{ 'opacity-25': disabling }"
                            :disabled="disabling"
                        >
                            {{$t('disable')}}
                        </DangerButton>
                    </ConfirmsPassword>
                </div>
            </div>
        </template>
    </ActionSection>
</template>
