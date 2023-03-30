<template>
    <aside class="hidden md:flex" aria-label="Aside" v-if="showOnline">
        <div
            class="w-60 h-[calc(100vh-56px)] px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 border border-0 border-r border-gray-200 dark:border-gray-700"
        >
            <Online />
        </div>
    </aside>
</template>

<script setup>
import Online from "@/Components/Online.vue";
defineProps({
    showOnline: {
        type: Boolean,
        default: true,
    },
});
</script>
