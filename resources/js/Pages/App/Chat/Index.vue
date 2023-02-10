<template>
    <AppLayout>
        <div class="flex flex-col space-y-2">
            <Link
                v-for="room in chatRooms"
                :href="route('app.chat.messages.index', room.uuid)"
                class="flex space-x-2 items-center justify-center p-5 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white"
            >
                <template #leading>
                    <Material icon="chat" />
                </template>
                <template #trailing>
                    <Material icon="arrow_forward" />
                </template>
                {{ room.name }}
            </Link>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Material from "@/Components/Material.vue";
import Link from "@/Components/Base/Link.vue";

defineProps({
    chatRooms: {
        type: Array,
        default: [],
    },
});
</script>
