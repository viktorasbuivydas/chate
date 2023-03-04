<template>
    <AdminLayout>
        <Breadcrumbs />
        <div class="mt-10 w-full">
            <div>
                <div class="font-bold text-xl">Pokalbių valdymas</div>
                <div class="mt-2 flex justify-between items-center">
                    <AdminChatTabs />
                    <div>
                        <BaseLink
                            variant="primary"
                            :href="route('app.admin.chat.room.create')"
                        >
                            <template #leading>
                                <Material icon="add" class="mr-2" />
                            </template>
                            Kurti</BaseLink
                        >
                    </div>
                </div>
                <div class="mt-4 w-full">
                    <BaseTable
                        :header="header"
                        :body="rooms.data"
                        :editAction="true"
                        editRoute="app.admin.chat.room.edit"
                        deleteRoute="app.admin.chat.room.delete"
                        :deleteAction="true"
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
import BaseLink from "@/Components/Base/Link.vue";
import Material from "@/Components/Material.vue";
import { ref } from "vue";

const props = defineProps({
    rooms: {
        type: Object,
        required: true,
    },
});
const header = ref([
    {
        name: "ID",
        key: "id",
    },
    {
        name: "Pavadinimas",
        key: "name",
    },
    {
        name: "Aktyvus",
        key: "active",
    },
    {
        name: "Privatus",
        key: "private",
    },
]);
</script>
