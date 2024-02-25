<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3'
import { hasRole, hasPermission }  from '@/rolePermission.js';

import InboxController from '@/Controllers/InboxController.js';
import ModalController from '@/Controllers/ModalController.js';

import IconPrimary     from '@/Components/Dashboard/Button/Primary.vue';
import Input           from '@/Components/Dashboard/Form/Input.vue';
import PageHeader      from '@/Components/Dashboard/PageHeader.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import InboxBody       from '@/Components/Dashboard/Inbox.vue';
import InboxItem       from '@/Components/Dashboard/Inbox/Item.vue';
import ShowView        from './HistoryLog/Show.vue';

defineProps({
  users: String,
  histories: Object
});

// Controladores
const Inbox = new InboxController();
const Modal = new ModalController();

// Variables de controladores
const modelModal = ref(Modal.modelModal);
const showModal  = ref(Modal.showModal);
const selectAll  = ref(Inbox.selectAll);

const dateStart = ref('');
const dateEnd = ref('');
const historyEvent = ref('');

const formatDate = (date) => {
  let x = new Date(date);
  
  return x.toLocaleDateString('es-MX');
}

const formatTime = (date) => {
  let x = new Date(date);

  return x.toLocaleTimeString('es-MX'); 
}

const search = () => {
  router.get(route('dashboard.histories.index', {
    historyEvent:historyEvent.value,
    dateStart:dateStart.value,
    dateEnd:dateEnd.value
  }), {}, {
    preserveState: true
  });
}

const searchWithPagination = (page) =>  {
    router.get(page), {
      historyEvent:historyEvent.value,
      dateStart:dateStart.value,
      dateEnd:dateEnd.value,
    }, {
        preserveState: true
    };
}
</script>

<template>
  <DashboardLayout :title="$t('history.title')">
    <PageHeader />
    <div class="w-full">
      <div class="mt-4">
        <p v-text="$t('history.description')" />
      </div>
    </div>
    <div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
      <div v-if="hasRole('admin|developer')">
        <Input
          id="search"
          :title="event"
          v-model="historyEvent"
          @keyup.enter="search"
          required
          autocomplete="off"
        />
      </div>
      <div>
        <Input
          id="startDate"
          v-model="dateStart"
          type="date"
          @keyup.enter="search"
          autocomplete="off"
        />
      </div>
      <div>
        <Input
          id="endDate"
          v-model="dateEnd"
          type="date"
          @keyup.enter="search"
          autocomplete="off"
        />
      </div>
      <div class="flex items-end">
        <IconPrimary
          class="w-full"
          @click="search"
        >
          {{$t('search')}}
        </IconPrimary>
      </div>
    </div>
    <div id="inbox" class="text-sm">
          <InboxBody
            :selectAll="selectAll"
            :links="histories.links"
            @send-pagination="searchWithPagination"
            @selectAll="Inbox.onSelectAll(histories)"
            withMultiSelection
        >
            <template #actions></template>
            <template v-for="history in histories.data">
                <InboxItem
                    :item="history"
                    :selectAll="selectAll"
                    @selectOne="Inbox.onSelectOne"
                    @unselectOne="Inbox.onUnselectOne"
                >
                    <template #item>
                        <span class="w-32 pr-2 truncate">{{ history.action }}</span>
                        <span class="truncate">{{ history.message }}</span>
                    </template>
                    <template #actions>
                        
                    </template>
                    <template #date>
                      {{ formatDate(history.created_at) }} {{ formatTime(history.created_at) }} 
                    </template>
                </InboxItem> 
            </template>

            <template v-if="histories.total < 1">
                <InboxItem>
                    <template #item>
                        <span class="w-24 pr-2 truncate">-</span>
                        <span class="w-full truncate">Sin resultados</span>
                    </template>
                    <template #date>
                       -
                    </template>
                </InboxItem> 
            </template>
          </InboxBody>
        </div>
  </DashboardLayout>

  <ShowView 
      v-if="hasPermission('users.index')"
      :show="showModal" 
      :history="modelModal" 
      @switchModal="Modal.switchShowEditModal"
      @close="Modal.switchShowModal"
  />
</template>
