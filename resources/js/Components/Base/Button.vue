<template>
    <button
        :type="type"
        class="focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2"
        :class="{
            'bg-blue-600 hover:bg-blue-700 text-white ': variant === 'primary',
            'bg-gray-600 hover:bg-gray-700 text-white': variant === 'secondary',
            'bg-red-600 hover:bg-red-700 text-white': variant === 'danger',
        }"
    >
        <slot />
    </button>
</template>

<script setup>
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
</script>
