<script setup>
import { ref } from 'vue';

const rotate = ref(true)
</script>

<template>
  <div
    class="-ml-5 w-full flex flex-col justify-center p-8"
    @mouseover="rotate = false"
    @mouseleave="rotate = true"
>
    <div class="relative w-full">
      <div
        class="absolute inset-0 -mr-3.5 bg-gradient-to-r from-sky-100 to-primary shadow-lg transform -skew-y-6 sm:skew-y-0 sm:rounded-3xl transition-all duration-300"
        :class="{'sm:rotate-2':rotate,'sm:-rotate-2':!rotate}"
      />
      <div class="relative bg-white shadow-lg sm:rounded-3xl">
        <div class="px-8 py-4">
          <!-- hero section -->
          <div class="mt-4 text-left">
            <slot />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>