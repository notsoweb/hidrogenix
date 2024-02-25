<script setup>
import Logo    from '@/Components/Dashboard/Logo.vue';

const emit = defineEmits(['open']);

const props = defineProps({
  sidebar: Boolean
});

const year = (new Date).getFullYear();
</script>

<template>
  <nav
    class="flex md:w-64 h-full transition-all duration-300 border-none"
    :class="{'w-screen':!sidebar}"
  >
    <div class="flex flex-col h-full p-2 md:w-64">
      <div class="flex w-[15.5rem] mt-[3.25rem] md:mt-0 justify-start items-center h-12 header-right rounded-lg bg-primary dark:bg-primary-dark text-white">
          <ul class="flex justify-center ml-4 md:mt-0 space-x-4 items-center">
            <li>
              <Logo
                class="text-lg inline-flex"
              />
            </li>
          </ul>
      </div>
      <div class="flex h-full mt-2 flex-col w-[15.5rem] justify-between rounded-lg  overflow-y-auto overflow-x-hidden bg-primary dark:bg-primary-dark text-white">
        <div>
          <ul class="flex h-full flex-col md:py-4 space-y-1">
            <slot />
          </ul>
        </div>
        <div class="mb-4 px-5 space-y-1">
          <p class="block text-center text-xs">
            &copy {{year}} {{$page.props.copyright}}
          </p>
          <p 
            class="block text-center text-xs"
            v-text="$t('copyright')"
          />
          <p class="text-center text-xs text-yellow-500 cursor-pointer">
              V{{$page.version}}
          </p>
        </div>
      </div>
    </div>
    <div
      class="h-full bg-transparent"
      :class="{'md:w-0':sidebar,'w-full md:w-0':!sidebar}"
      @click="emit('open')" 
    ></div>
  </nav>
</template>