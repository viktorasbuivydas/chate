<template>
    <AdminLayout>
        <Breadcrumbs />
        <div class="grid grid-cols-1 gap-5 mt-10 w-full">
            <div>
                <div class="font-bold text-xl">Pokalbių valdymas</div>
                <div class="mt-2">
                    <AdminChatTabs />
                </div>
                <div class="mt-4 w-full">
                    <BaseTable
                        :header="header"
                        :body="rooms.data"
                        :editAction="true"
                        editRoute="app.admin.chat.room.edit"
                    />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import AdminChatTabs from "@/Components/Admin/Chat/Tabs/Index.vue";
import BaseTable from "@/Components/Base/Table.vue";
import { ref } from "vue";
import Material from "@/Components/Material.vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    rooms: {
        type: Object,
        required: true,
    },
});
const header = ref(["id", "name", "online", "private", "active"]);
</script>
