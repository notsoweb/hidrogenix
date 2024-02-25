<script setup>
import { onUpdated, ref } from 'vue';

const emit = defineEmits([
    'selectOne',
    'unselectOne'
]);

const props = defineProps({
    item: Object,
    selectAll: {
        type: Boolean,
        default: false
    }
})

const check = ref(false);
const checked = ref(false);
const messageHover = ref(false);

const selectOne = () => {
    if(check.value.checked) {
        emit('selectOne', props.item);
        checked.value = true;
    } else {
        emit('unselectOne', props.item);
        checked.value = false;
    }
};

onUpdated(() => {
    checked.value = check.value.checked;
});
</script>

<template>
    <li
        class="flex items-center border-y px-2 min-h-[40px] md:min-h-[35px] transition duration-300"
        :class="{'bg-primary text-primary-on dark:bg-primary-dark dark:text-primary-dark-on':checked, 'text-primary dark:text-primary-dark hover:bg-primary/30 dark:hover:bg-primary-dark/30 hover:text-primary-on dark:hover:text-primary-dark-on':!checked}"
    >
        <div class="pr-2">
            <input
                type="checkbox"
                class="mt-1 focus:ring-0 border-2 border-primary"
                ref="check"
                :checked="selectAll"
                @click="selectOne"
            >
        </div>
        <div @mouseover="messageHover = true" @mouseleave="messageHover = false" class="w-full flex items-center justify-between cursor-pointer">
            <div class="flex items-center w-fit">
                <slot name="item" />
            </div>
            <div class="w-36 flex items-center justify-end">
                <div class="text-xl md:text-lg  hover:text-yellow-500 flex items-center space-x-2" :class="{'hidden':!messageHover}">
                    <slot name="actions" />
                </div>
                <div :class="{'hidden':messageHover}" class="flex space-x-4 text-xs">
                    <slot name="date" />
                </div>
            </div>
        </div>
    </li>
</template>