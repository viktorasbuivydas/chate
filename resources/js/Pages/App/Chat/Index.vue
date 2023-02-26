<template>
    <AppLayout>
        <div class="flex flex-col space-y-2">
            <template v-if="chatRooms.length > 0">
                <Link
                    v-for="room in chatRooms"
                    v-if="canUserSeeAdminContent(roles)"
                    class="py-5"
                    :href="route('app.chat.messages.index', room)"
                >
                    <template #leading>
                        <Material v-if="room.private" icon="lock" />
                        <Material v-else icon="chat" />
                    </template>
                    <template #trailing>
                        <Material icon="arrow_forward" />
                    </template>
                    {{ room.name }}
                </Link>
            </template>
            <template v-else>
                <BaseError icon="chat">
                    Nepavyko rasti pokalbių kanalų
                </BaseError>
            </template>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Material from "@/Components/Material.vue";
import Link from "@/Components/Base/Link.vue";
import BaseError from "@/Components/Base/Error.vue";
import useRole from "@/Use/useRole.js";
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

defineProps({
    chatRooms: {
        type: Array,
        default: [],
    },
});

const { canUserSeeAdminContent } = useRole();

const roles = computed(() => {
    return usePage().props.value.roles;
});
</script>
