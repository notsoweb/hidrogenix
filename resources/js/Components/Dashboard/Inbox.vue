<script setup>
import { ref } from 'vue';
import GoogleIcon from '../Shared/GoogleIcon.vue';

const emit = defineEmits([
    'selectAll',
    'send-pagination'
]);

const props = defineProps({
    links: Array,
    withMultiSelection: Boolean
});

const selectAll = ref(false);
const filterMessages = ref(false);

const checked = () => {
    selectAll.value = !selectAll.value;
    emit('selectAll', selectAll.value);
}
</script>

<template>
    <div class="w-full flex overflow-x-auto">
        <div class="w-fit">
            <div v-if="$slots['main-menu']" class="w-48 xl:w-64">
                <slot
                    name="main-menu"
                />
            </div>
            <div 
                v-if="$slots['menu']"
                class="w-48 xl:w-64 pr-2 pb-8 border-r border-gray-300"
                :class="{'mt-16':!$slots['main-menu']}"
            >
                <ul class="space-y-2">
                    <slot
                        name="menu"
                    />
                </ul>
            </div>
        </div>
        <div class="flex-1">
            <div v-if="$slots['actions']" class="h-16 flex items-center justify-between py-2">
                <div class="flex items-center">
                    <div v-if="withMultiSelection" class="relative flex items-center px-0.5 space-x-0.5">
                        <div class="pl-2">
                            <input
                                class="focus:ring-0"
                                type="checkbox"
                                @click="checked"
                            >
                        </div>
                        <button @click="filterMessages = !filterMessages">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div @click.away="filterMessages = false" class="bg-gray-200 shadow-2xl absolute left-0 top-6 w-32 py-2 text-gray-900 rounded z-10" :class="{'hidden':!filterMessages}">
                            <slot
                                name="multi-selection"
                            />
                        </div>
                    </div>
                    <div class="flex items-center">
                        <slot name="actions" />
                    </div>
                </div>
                <template v-if="links">
                    <div v-if="links.length > 3" class="flex w-full justify-end">
                        <div class="flex w-full justify-end flex-wrap space-x-1 -mb-1">
                          <template v-for="(link, k) in links" :key="k">
                            <div v-if="link.url === null && k == 0"
                                class="px-2 py-1 text-sm leading-4 text-gray-400 border rounded"
                            >
                                <GoogleIcon
                                    name="arrow_back"
                                />
                            </div>
                            <button v-else-if="k === 0" class="px-2 py-1 text-sm leading-4 border rounded" 
                                :class="{ 'bg-primary dark:bg-primary-dark text-white': link.active }"
                                @click="$emit('send-pagination', link.url)"
                            >
                                <GoogleIcon
                                    name="arrow_back"
                                />
                            </button>
                            <div v-else-if="link.url === null && k == (links.length - 1)"
                                class="px-2 py-1 text-sm leading-4 text-gray-400 border rounded"
                            >
                                <GoogleIcon
                                    name="arrow_forward"
                                />
                            </div>
                            <button v-else-if="k === (links.length - 1)" class="px-2 py-1 text-sm leading-4 border rounded" 
                                :class="{ 'bg-primary dark:bg-primary-dark text-white': link.active }"
                                @click="$emit('send-pagination', link.url)"
                            >
                                <GoogleIcon
                                    name="arrow_forward"
                                />
                            </button>
                            <button v-else class="px-2 py-1 text-sm leading-4 border rounded" 
                                :class="{ 'bg-primary dark:bg-primary-dark text-primary-on dark:text-primary-dark-on': link.active }"
                                v-html="link.label"
                                @click="$emit('send-pagination', link.url)"
                            ></button>
                          </template>
                        </div>
                    </div>
                </template>
            </div>
            <div v-else class="w-full mt-4"></div>
            <div class="bg-gray-100 ">
                <ul>
                  <slot />
                </ul>
            </div>
        </div>
    </div>
</template>