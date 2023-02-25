<template>
    <div
        class="bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700"
        :class="{
            'border-0': variant === 'borderless',
        }"
    >
        <div
            class="font-normal text-gray-700 dark:text-gray-400 flex flex-col space-y-2"
        >
            <div class="text-xl font-bold">
                <slot name="headline" />
            </div>
            <slot />
        </div>
    </div>
</template>
<script setup>
defineProps({
    variant: {
        type: String,
        default: "primary",
    },
});
</script>
