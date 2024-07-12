<script setup>
import { nextTick, ref } from 'vue'

defineProps({
    title: String
})

const showFaq  = ref(false)
const showText = ref(false)

const open = async () => {
    showFaq.value =! showFaq.value
    await nextTick()
    showText.value =! showText.value
}

</script>

<template>
    <div class="flex flex-col w-full p-4 h-full space-y-2 shadow-md transition-all duration-300">
        <div @click="open" class="flex w-full justify-between">
            <div>
                <h4  class="font-semibold cursor-pointer">
                    {{ title }}
                </h4>
            </div>
            <div>
            <button class="text-gray-500 w-10 h-10 -mt-2 relative focus:outline-none bg-white" @click="open = !open">
                <span class="sr-only">Open main menu</span>
                <div class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
                    <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': showFaq,' -translate-y-1.5': !showFaq }"></span>
                    <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out" :class="{'opacity-0': showFaq } "></span>
                    <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': showFaq, ' translate-y-1.5': !showFaq}"></span>
                </div>
            </button>
        </div>
        </div>
        <div v-show="showText" class="h-full space-y-4 overflow-y-auto transition-all">
            <slot />
        </div>
    </div>
</template>