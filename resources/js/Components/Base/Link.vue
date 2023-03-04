<template>
    <Link
        :href="href"
        class="flex space-x-2 items-center justify-center px-5 py-2 text-base font-medium rounded-lg"
        :class="{
            'bg-gray-800 hover:bg-gray-700 text-white': variant === '',
            'bg-blue-600 hover:bg-blue-700 text-white ': variant === 'primary',
            'bg-gray-600 hover:bg-gray-700 text-white': variant === 'secondary',
        }"
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
    variant: {
        type: String,
        default: "",
    },
});
</script>
