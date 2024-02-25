<script setup>
import { ref } from 'vue';
import { Link, router} from '@inertiajs/vue3'
import { hasRole }  from '@/rolePermission.js';
import IconPrimary     from '@/Components/Dashboard/Button/Primary.vue';
import Input           from '@/Components/Dashboard/Form/Input.vue';
import PageHeader      from '@/Components/Dashboard/PageHeader.vue';
import Table           from '@/Components/Dashboard/Table.vue';
import Icon            from '@/Components/Shared/GoogleIcon.vue';
import GoogleIcon      from '@/Components/Shared/GoogleIcon.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Destroy         from './Destroy.vue';

defineProps({
  notifications: Object
});

const dateStart = ref('');
const dateEnd = ref('');
const destroyModal = ref(false);
const notification = ref(null);

const formatDate = (date) => {
  let x = new Date(date);
  
  return x.toLocaleDateString('es-MX');
}

const formatTime = (date) => {
  let x = new Date(date);

  return x.toLocaleTimeString('es-MX'); 
}

const search = () => {
  router.get(route('dashboard.notifications.index', {
    dateStart:dateStart.value,
    dateEnd:dateEnd.value
  }), {}, {
    preserveState: true
  });
}

const searchWithPagination = (page) =>  {
  router.get(route('dashboard.notifications.index', {
    dateStart:dateStart.value,
    dateEnd:dateEnd.value,
    page:page
  }), {}, {
    preserveState: true
  });
}

const edit = (detail) => {
  router.put(route('dashboard.notifications.update', detail.id), {}, {
    preserveState: true,
    preserveScroll: true,
    onSuccess: () => {
      Notify.success(lang('readed'));
    }
  });
}

const destroy = (detail) => {
  notification.value = detail;
  switchDestroyModal();
}

const switchDestroyModal = () => destroyModal.value = !destroyModal.value;
</script>

<template>
  <DashboardLayout :title="$t('notifications.title')">
    <PageHeader />
    <div class="w-full  bg-white border-gray-200">
      <div class="mt-8">
        <p v-text="$t('notifications.description')" />
      </div>
    </div>
    <div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-3">
      <div>
        <Input
          id="startDate"
          type="date"
          v-model="dateStart"
          @keyup.enter="search"
          autocomplete="off"
        />
      </div>
      <div>
        <Input
          id="endDate"
          type="date"
          v-model="dateEnd"
          @keyup.enter="search"
          autocomplete="off"
        />
      </div>
      <div class="flex items-end">
        <IconPrimary
          @click="search"
          class="w-full"
        >
          {{$t('search')}}
        </IconPrimary>
      </div>
    </div>
    <div class="w-full">
      <Table :items="notifications"  @send-pagination="searchWithPagination">
        <template #head>
            <th
              class="table-item"
              v-text="$t('description')" 
            />
            <th
              class="table-item"
              v-text="$t('date')" 
            />
            <th
              class="table-item"
              v-text="$t('status')" 
            />
            <th
              class="table-item"
              v-text="$t('actions')" 
            />
        </template>
        <template #body="{items}">
          <template v-for="notification in items">
            <tr>
              <td class="table-item border">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold text-black">
                      {{ notification.data.message }}
                    </p>
                  </div>
                </div>
              </td>
              <td class="table-item border">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold text-black">
                      <b>{{ $t('date') }}:</b> {{ formatDate(notification.created_at) }}
                    </p>
                    <p class="font-semibold text-black">
                      <b>{{ $t('hour') }}:</b> {{ formatTime(notification.created_at) }}
                    </p>
                  </div>
                </div>
              </td>
              <td class="table-item border">
                <div class="flex items-center text-sm">
                  <div>
                    <p v-if="notification.read_at" class="font-semibold text-white bg-success px-2 rounded-md">
                      {{ $t('readed') }}
                    </p>
                    <p v-else="notification.read_at" class="font-semibold text-white bg-info px-2 rounded-md">
                      {{ $t('unreaded') }}
                    </p>
                  </div>
                </div>
              </td>
              <td class="table-item border">
                  <div class="flex justify-center space-x-2">
                    <GoogleIcon
                        v-if="!notification.read_at"
                        :title="$t('readed')"
                        class="btn-icon-primary"
                        name="mark_email_read"
                        outline
                        @click="edit(notification)"
                    />
                    <template v-if="hasRole('developer')">
                      <GoogleIcon
                        :title="$t('crud.destroy')"
                        class="btn-icon-primary"
                        name="delete"
                        outline
                        @click="destroy(notification)"
                      />
                    </template>
                  </div>
                </td>
            </tr>
          </template>
        </template>
        <template #empty>
                    <td class="table-item border">
                        -
                    </td>
                    <td class="table-item border">
                        -
                    </td>
                    <td class="table-item border">
                        -
                    </td>
                </template>
      </Table>
    </div>
    <Destroy
      :show="destroyModal"
      :notification="notification"
      @close="switchDestroyModal"
    />
  </DashboardLayout>
</template>
