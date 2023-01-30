<template>
    <div
        class="flex flex-col w-fit p-4 mt-6 rounded-lg bg-blue-50 dark:bg-blue-900"
    >
        <div class="flex items-center justify-center mb-3 relative">
            <div class="absolute right-0 flex items-center justify-center">
                <button class="flex hover:bg-blue-700 rounded-md p-1">
                    <Material icon="close" />
                </button>
            </div>
            <span
                class="bg-orange-100 text-orange-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-900"
            >
                <slot name="headline" />
            </span>
        </div>
        <p
            class="text-sm text-blue-900 dark:text-blue-200 text-center space-y-2"
        >
            <slot />
        </p>
    </div>
</template>

<script setup>
import Material from "@/Components/Material.vue";

// todo close this notification.
// update user setting to do not display notification with specific id
</script>
