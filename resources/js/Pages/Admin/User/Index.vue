<script setup>
import { transl, can, goTo } from './Component'
import { ref } from 'vue';
import { Link  } from '@inertiajs/vue3';

import ModalController    from '@/Controllers/ModalController.js';
import SearcherController from '@/Controllers/SearcherController.js';

import SearcherHead    from '@/Components/Dashboard/Searcher.vue';
import Table           from '@/Components/Dashboard/Table.vue';
import GoogleIcon      from '@/Components/Shared/GoogleIcon.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import DestroyView     from './Destroy.vue';
import EditView        from './Edit.vue';
import ShowView        from './Show.vue';

const props = defineProps({
    users: Object
});

// Controladores
const Modal    = new ModalController();
const Searcher = new SearcherController(goTo('index'));

// Variables de controladores
const destroyModal = ref(Modal.destroyModal);
const editModal    = ref(Modal.editModal);
const showModal    = ref(Modal.showModal);
const modelModal   = ref(Modal.modelModal);
const query        = ref(Searcher.query);
</script>  

<template>
    <DashboardLayout :title="transl('system')">
        <SearcherHead @search="Searcher.search">
            <Link
            v-if="can('create')"
                :href="route(goTo('create'))"
            >
                <GoogleIcon
                    :title="$t('crud.create')"
                    class="btn-icon-primary"
                    name="add"
                    outline
                />
            </Link>
        </SearcherHead>
        <div class="pt-2 w-full">
            <Table 
                :items="users"
                @send-pagination="Searcher.searchWithPagination"
            >
                <template #head>
                    <th
                        class="table-item"
                        v-text="$t('user')"
                    />
                    <th
                        class="table-item"
                        v-text="$t('contact')"
                    />
                    <th
                        class="table-item w-44"
                        v-text="$t('actions')"
                    />
                </template>
                <template #body="{items}">
                    <tr v-for="model in items">
                        <td class="table-item border">
                          <div class="flex items-center text-sm">
                            <div>
                              <p class="font-semibold">
                                {{ model.full_name }}
                              </p>
                            </div>
                          </div>
                        </td>
                        <td class="table-item border">
                          <div class="flex items-center text-sm">
                            <div class="text-left">
                              <p class="font-semibold">
                                <a 
                                    :href="`mailto:${model.email}`"
                                    class="hover:underline"
                                    target="_blank"
                                >
                                    {{ model.email }}
                                </a>
                              </p>
                              <p v-if="model.phone" class="font-semibold text-xs">
                                <b>Teléfono: </b>
                                <a 
                                    :href="`tel:${model.phone}`"
                                    class="hover:underline"
                                    target="_blank"
                                >
                                    {{ model.phone }}
                                </a>
                              </p>
                            </div>
                          </div>
                        </td>
                        <td class="table-item border">
                            <div class="flex justify-center space-x-2">
                                <GoogleIcon
                                    :title="$t('crud.show')"
                                    class="btn-icon-primary"
                                    name="visibility"
                                    outline
                                    @click="Modal.switchShowModal(model)"
                                />
                                <GoogleIcon
                                    v-if="can('edit')"
                                    :title="$t('crud.edit')"
                                    class="btn-icon-primary"
                                    name="edit"
                                    outline
                                    @click="Modal.switchEditModal(model)"
                                />
                                <GoogleIcon
                                    v-if="can('destroy')"
                                    :title="$t('crud.destroy')"
                                    class="btn-icon-primary"
                                    name="delete"
                                    outline
                                    @click="Modal.switchDestroyModal(model)"
                                />
                                <Link
                                    v-if="can('config')"
                                    :href="route(goTo('settings'), model.id)"
                                >
                                    <GoogleIcon
                                        :title="$t('setting')"
                                        class="btn-icon-primary"
                                        name="settings"
                                    />
                                </Link>
                            </div>
                        </td>
                    </tr>
                </template>
                <template #empty>
                    <td class="table-item border">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold">
                                {{ $t('registers.empty') }}
                            </p>
                          </div>
                        </div>
                    </td>
                    <td class="table-item border">-</td>
                    <td class="table-item border">-</td>
                </template>
            </Table>
        </div>
        
        <ShowView 
            v-if="can('index')"
            :show="showModal" 
            :model="modelModal" 
            @switchModal="Modal.switchShowEditModal"
            @close="Modal.switchShowModal"
        />
        <EditView
            v-if="can('edit')"
            :show="editModal"
            :model="modelModal"
            @switchModal="Modal.switchShowEditModal"
            @close="Modal.switchEditModal"
        />
        <DestroyView
            v-if="can('create')"
            :show="destroyModal"
            :model="modelModal"
            @close="Modal.switchDestroyModal"
        />
    </DashboardLayout>
</template>
    