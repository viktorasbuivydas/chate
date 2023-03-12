<template>
    <div>
        <div
            class="flex items-center space-x-4 border rounded-lg border-gray-700 p-2"
        >
            <div class="flex-shrink-0">
                <img
                    class="w-8 h-8 rounded-full"
                    :src="item.user.profile_photo_url"
                    :alt="item.user.name"
                />
            </div>
            <div class="flex-1 min-w-0">
                <p
                    class="text-sm font-medium text-gray-900 truncate dark:text-white"
                >
                    {{ item.user.name }}
                </p>
                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                    {{ item.comment }}
                </p>
            </div>
            <div
                class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
            >
                {{ item.created_at }}
            </div>
        </div>
    </div>
</template>
<script setup>
defineProps({
    item: {
        type: Object,
        required: true,
    },
});
</script>
