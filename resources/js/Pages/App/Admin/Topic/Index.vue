<template>
    <AdminLayout>
        <Breadcrumbs />
        <div class="mt-10 w-full">
            <div>
                <div class="font-bold text-xl">Pokalbių valdymas</div>
                <div class="mt-2 flex justify-end items-center">
                    <div>
                        <BaseLink
                            variant="primary"
                            :href="route('app.admin.topic.create')"
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
                        :body="topics.data"
                        :deleteAction="true"
                        deleteRoute="app.admin.topic.delete"
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
import BaseLink from "@/Components/Base/Link.vue";
import Material from "@/Components/Material.vue";
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
        name: "Pakeista",
        key: "updated_at",
    },
]);
</script>
