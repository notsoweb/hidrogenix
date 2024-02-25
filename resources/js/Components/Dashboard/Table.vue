<script setup>
import GoogleIcon from '../Shared/GoogleIcon.vue';

const emit = defineEmits([
  'send-pagination'
]);

const props = defineProps({
    items: Object,
});
</script>

<template>
    <section class="py-4">
        <div class="w-full overflow-hidden rounded-md shadow-lg">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="table-head">
                            <slot name="head" />
                        </tr>
                    </thead>
                    <tbody class="">
                        <template v-if="items.total > 0">
                            <slot
                                name="body"
                                :items="items.data"
                            />
                        </template>
                        <template v-else>
                            <tr>
                                <slot name="empty" />
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <template v-if="items.links">
        <div v-if="items.links.length > 3" class="flex w-full justify-end">
            <div class="flex w-full justify-end flex-wrap space-x-1 -mb-1">
              <template v-for="(link, k) in items.links" :key="k">
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
                <div v-else-if="link.url === null && k == (items.links.length - 1)"
                    class="px-2 py-1 text-sm leading-4 text-gray-400 border rounded"
                >
                    <GoogleIcon
                        name="arrow_forward"
                    />
                </div>
                <button v-else-if="k === (items.links.length - 1)" class="px-2 py-1 text-sm leading-4 border rounded" 
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
</template>