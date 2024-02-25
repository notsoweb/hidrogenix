<script setup>
import { goTo, transl } from './Component';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

import VueMultiselect from 'vue-multiselect'
import PrimaryButton  from '@/Components/Dashboard/Button/Primary.vue';
import FormSection    from '@/Components/Dashboard/FormSection.vue';

const props = defineProps({
    roles: Object,
    user: Object,
    userRoles: Object
});

const value =  ref(props.userRoles);

const form = useForm({
    _method: 'POST',
    user_id: props.user.id
});

const updateProfileInformation = () => {
    form.transform(data => ({
        ...data,
        roles: value.value
    })).post(route(goTo('syncRoles')), {
        preserveScroll: true,
        onSuccess: () =>  Notify.success(lang('updated')),
        onError: () => Notify.error(lang('updatedFail'))
    });
};
</script>

<template>
    <FormSection @submitted="updateProfileInformation">
        <template #title>
            {{ transl('roles.title') }}
        </template>
        <template #description>
            {{ transl('roles.description') }}
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-4 space-y-4">
                <div>
                    <label class="typo__label">{{ $t('roles.title') }}</label>
                    <VueMultiselect 
                        v-model="value"
                        :options="roles"
                        :multiple="true"
                        :close-on-select="false"
                        :clear-on-select="false"
                        :preserve-search="true"
                        :selectedLabel="$t('selected')"
                        :selectLabel="$t('select')"
                        :deselectLabel="$t('remove')"
                        :placeholder="$t('search') + '...'"
                        label="description"
                        track-by="id"
                    >
                        <template slot="selection" v-slot="{ values, search, isOpen }">
                            <span 
                                class="multiselect__single" 
                                v-if="values.length &amp;&amp; !isOpen"
                            >
                                {{ values.length }} options selected
                            </span>
                        </template>
                        <template #noOptions>
                            {{ $t('noRecords') }}
                        </template>
                    </VueMultiselect>
                </div>
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
