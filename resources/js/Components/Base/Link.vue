<template>
    <Link
        :href="href"
        class="flex space-x-2 items-center justify-center p-5 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white"
    >
        <slot name="leading" />
        <span class="w-full">
            <slot />
        </span>
        <slot name="trailing" />
    </Link>
</template>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    href: {
        type: String,
        default: "",
    },
});
</script>
