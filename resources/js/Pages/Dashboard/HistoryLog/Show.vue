<script setup>
import { hasPermission } from '@/rolePermission.js';

import ShowModal  from '@/Components/Dashboard/Modal/Show.vue';
import GoogleIcon from '@/Components/Shared/GoogleIcon.vue';

const emit = defineEmits([
    'close', 
    'switchModal'
]);

let props = defineProps({
    show: Boolean,
    history: Object
});

const formatDate = (date) => {
  let x = new Date(date);
  
  return x.toLocaleDateString('es-MX');
}

const formatTime = (date) => {
  let x = new Date(date);

  return x.toLocaleTimeString('es-MX'); 
}
</script>
<template>
    <ShowModal
        :show="show"
        :editable="false"
        @close="$emit('close')"
        @edit="$emit('switchModal')"
        editable
    >
        <div class="w-full right-0 mt-2">
            <div class="bg-white rounded overflow-hidden shadow-lg">
                <div class="text-center p-6 bg-primary dark:bg-primary-dark border-b">
                    <p class="pt-2 text-lg font-bold text-gray-50">
                        {{history.name}}
                    </p>
                    <p class="text-sm text-gray-100">
                        {{history.paternal}}  {{history.maternal}}
                    </p>
                </div>
                <div class="py-2 border-b">
                    <div>
                        <div class="px-4 py-2 hover:bg-gray-100 flex">
                            <GoogleIcon 
                                class="text-xl text-green-600"
                                name="contact_mail"
                            />
                            <div class="w-full pl-3">
                                <p class="font-semibold text-black">
                                  <b>{{$t('event')}}:</b> {{ history.action }}
                                </p>
                                <p class="font-semibold text-black">
                                  <b>{{$t('date')}}:</b> {{ formatDate(history.created_at) }}
                                </p>
                                <p class="font-semibold text-black">
                                  <b>{{$t('hour')}}:</b> {{ formatTime(history.created_at) }}
                                </p>
                            </div>
                        </div>
                        <div class="px-4 py-2 hover:bg-gray-100 flex">
                            <GoogleIcon 
                                class="text-xl text-green-600"
                                name="contact_mail"
                            />
                            <div v-if="history.data?.new && history.data?.old" class="w-full pl-3">
                                <p class="text-gray-800">
                                    <b>{{$t('changes')}}:</b> 
                                </p>
                                <div class="w-full">
                                    <div class="w-full p-4 rounded-sm bg-red-100">
                                        <p v-for="element, key in history.data.old">
                                            <b>{{ $t(key) }}:</b> {{element}}
                                        </p>
                                    </div>
                                    <div class="w-full p-4 rounded-sm bg-green-100">
                                        <p v-for="element, key in history.data.new">
                                            <b>{{ $t(key) }}:</b> {{element}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div v-else class="w-full pl-3">
                                <p class="text-gray-800">
                                    <b>{{$t('details')}}:</b> 
                                </p>
                                <div class="w-full">
                                    <div class="w-full p-4 rounded-sm bg-gray-100">
                                        <p v-for="element, key in history.data">
                                            <b>{{ $t(key) }}:</b> {{element}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ShowModal>
</template>