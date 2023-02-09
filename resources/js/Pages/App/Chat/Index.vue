<template>
    <AppLayout>
        <div v-for="room in chatRooms">
            <Link :href="route('app.chat.messages.index', room.uuid)">
                {{ room.name }}
            </Link>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    chatRooms: {
        type: Array,
        default: [],
    },
});
</script>
