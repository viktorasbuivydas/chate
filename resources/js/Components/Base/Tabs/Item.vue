<template>
    <button
        class="inline-flex p-4 border-b-2 border-transparent rounded-t-lg group"
        :class="{
            'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group':
                !activeTab && !disabledTab,
            ' text-blue-600 border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group':
                activeTab,
            'inline-block  text-gray-400 cursor-not-allowed dark:text-gray-500':
                disabledTab,
        }"
    >
        <slot />
    </button>
</template>
<script setup>
defineProps({
    activeTab: {
        type: Boolean,
        default: false,
    },
    tab: {
        type: String,
        default: "",
    },
    disabledTab: {
        type: Boolean,
        default: false,
    },
});
</script>
