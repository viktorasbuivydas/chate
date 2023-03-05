<template>
    <AdminLayout>
        <Breadcrumbs />
        <div class="mt-10 w-full">
            <div>
                <div class="font-bold text-xl">Topic valdymas</div>
                <div class="mt-4 w-full">
                    <BaseTable
                        :header="header"
                        :body="topics.data"
                        :editAction="true"
                        editRoute="app.admin.topic.edit"
                    />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import BaseTable from "@/Components/Base/Table.vue";
import { ref } from "vue";

const props = defineProps({
    topics: {
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
        name: "Tipas",
        key: "type",
    },
    {
        name: "Topic",
        key: "content",
    },
    {
        name: "Vartotojas",
        key: "username",
    },
    {
        name: "Pakeista",
        key: "updated_at",
    },
]);
</script>
