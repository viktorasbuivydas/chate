<template>
    <AppLayout>
        <div class="flex flex-col space-y-2">
            <Link
                v-for="room in chatRooms"
                class="p-5"
                :href="route('app.chat.messages.index', room.uuid)"
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
