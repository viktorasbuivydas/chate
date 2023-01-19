<template>
    <span
        class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300"
    >
        {{ label }}
    </span>
</template>

<script setup>
defineProps({
    label: {
        type: String,
        required: true,
    },
});
</script>
