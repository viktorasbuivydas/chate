<template>
    <div
        class="absolute right-10 top-5 z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
        id="user-dropdown"
    >
        <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">{{
                user.name
            }}</span>
        </div>
        <ul class="py-1"></ul>
    </div>
</template>

<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

const user = computed(() => usePage().props.value.user);
</script>
