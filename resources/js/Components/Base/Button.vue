<template>
    <button
        :type="type"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700"
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
});
</script>
