<script setup>
import { can, goTo, transl } from './Component';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

import ModalController from '@/Controllers/ModalController.js';
import SearcherController from '@/Controllers/SearcherController.js';

import SearcherHead    from '@/Components/Dashboard/Searcher.vue';
import Table           from '@/Components/Dashboard/Table.vue';
import GoogleIcon      from '@/Components/Shared/GoogleIcon.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import DestroyView     from './Destroy.vue';
import EditView        from './Edit.vue';

defineProps({
    roles: Object
});

// Controladores
const Modal = new ModalController();
const Searcher = new SearcherController(goTo('index'));

// Variables de controladores
const destroyModal = ref(Modal.destroyModal);
const editModal    = ref(Modal.editModal);
const modelModal   = ref(Modal.modelModal);
const query        = ref(Searcher.query);
</script>

<template>
    <DashboardLayout :title="transl('title')">
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
            <Table :items="roles" @send-pagination="Searcher.searchWithPagination">
                <template #head>
                    <th
                        class="table-item"
                        v-text="$t('role')"
                    />
                    <th
                        class="table-item"
                        v-text="$t('description')"
                    />
                    <th
                        class="table-item"
                        v-text="$t('actions')"
                    />
                </template>
                <template #body="{items}">
                    <tr v-for="model in items">
                        <td class="table-item border">
                          <div class="flex items-center text-sm">
                            <div>
                                <p class="font-semibold">
                                    {{ model.name }}
                                </p>
                            </div>
                          </div>
                        </td>
                        <td class="table-item border">
                          <div class="flex items-center text-sm">
                            <div>
                                <p class="font-semibold">
                                    {{ model.description }}
                                </p>
                            </div>
                          </div>
                        </td>
                        <td class="table-item border w-40">
                            <div class="flex justify-center space-x-2">
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
                            </div>
                        </td>
                    </tr>
                </template>
            </Table>
        </div>
        <EditView
            v-if="can('edit')"
            :model="modelModal"
            :show="editModal"
            @close="Modal.switchEditModal"
        />
        <DestroyView
            v-if="can('destroy')"
            :model="modelModal"
            :show="destroyModal"
            @close="Modal.switchDestroyModal"
        />
    </DashboardLayout>
</template>
    