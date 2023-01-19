<template>
    <li>
        <Link
            :href="route_url"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
        >
            <template v-if="icon">
                <Material :icon="icon" />
            </template>
            <span class="ml-3">{{ label }}</span>
            <BaseBadge v-if="badge" :label="badge" />
            <BaseCount v-if="count" :label="count" />
        </Link>
    </li>
</template>

<script setup>
import BaseBadge from "@/Components/Base/Badge.vue";
import BaseCount from "@/Components/Base/Count.vue";
import Material from "@/Components/Material.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    label: {
        type: String,
        required: true,
    },
    badge: {
        type: String,
        required: false,
    },
    count: {
        type: Number,
        required: false,
    },
    icon: {
        type: String,
        required: false,
    },
    route_url: {
        type: String,
        required: true,
    },
});
</script>
