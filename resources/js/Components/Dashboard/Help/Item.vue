<script setup>
import GoogleIcon from '@/Components/Shared/GoogleIcon.vue';

defineProps({
  icon: String,
  version: String
});
</script>

<template>
  <tr>
    <td class="table-item border">
      <div class="flex items-center text-sm">
        <div class="flex justify-center text-center">
          <p v-if="icon" class="text-center">
            <GoogleIcon
              class="text-2xl"
              :name="icon"
              outline
            />
          </p>
          <p 
            v-if="version"
            class="text-center"
            v-text="version"
          />
        </div>
      </div>
    </td>
    <td class="table-item border">
      <div class="flex items-center text-sm">
        <slot />
      </div>
    </td>
  </tr>
</template>