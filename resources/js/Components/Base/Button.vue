<template>
    <button
        :type="type"
        class="focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 flex justify-center items-center"
        :class="{
            'bg-primary hover:bg-primary-hover text-white ': variant === 'primary',
            'bg-gray-600 hover:bg-gray-700 text-white': variant === 'secondary',
            'bg-red-600 hover:bg-red-700 text-white': variant === 'danger',
        }"
    >
        <div v-if="slot.leading">
            <slot name="leading" />
        </div>
        <div>
            <slot />
        </div>
    </button>
</template>

<script setup>
import { useSlots } from "vue";

defineProps({
    type: {
        type: String,
        default: "submit",
    },
    variant: {
        type: String,
        default: "primary",
    },
});
const slot = useSlots();
</script>
