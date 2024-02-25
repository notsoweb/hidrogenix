<script setup>
import { goTo, transl } from './Component';
import { Link } from '@inertiajs/vue3';
import { hasPermission } from '@/rolePermission.js';

import PageHeader      from '@/Components/Dashboard/PageHeader.vue';
import SectionBorder   from '@/Components/Dashboard/SectionBorder.vue';
import GoogleIcon      from '@/Components/Shared/GoogleIcon.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Roles           from './Roles.vue';
import UpdatePassword  from './UpdatePassword.vue';

defineProps({
    roles: Object,
    user: Object,
    userRoles: Object
});
</script>

<template>
    <DashboardLayout :title="transl('settings')">
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
        <div class="flex w-full pt-2">
            <div class="w-full text-center p-2 bg-primary dark:bg-primary-dark border-b rounded-lg">
                <p class="pt-2 text-lg font-bold text-gray-50">
                    {{ user.name }}
                </p>
                <p class="text-sm text-gray-100">
                    {{ user.full_last_name }}
                </p>
            </div>
        </div>
        <div class="w-full mt-12 space-y-4">
            <UpdatePassword
                :user="user"
            />
            <SectionBorder />
            <Roles
                v-if="hasPermission('roles.edit')"
                :roles="roles"
                :user="user"
                :userRoles="userRoles"
            />
            <SectionBorder />
        </div>
    </DashboardLayout>
</template>
    