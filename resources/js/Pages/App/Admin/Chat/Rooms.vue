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
                    <BaseTable :header="header" :body="rooms.data">
                        <template #actions>
                            <div class="flex space-x-2 items-center">
                                <button
                                    class="text-green-500 hover:text-green-200"
                                >
                                    <Material icon="visibility" />
                                </button>
                                <button
                                    class="text-blue-500 hover:text-blue-200"
                                >
                                    <Material icon="edit" />
                                </button>
                                <button class="text-red-500 hover:text-red-200">
                                    <Material icon="delete" />
                                </button>
                            </div>
                        </template>
                    </BaseTable>
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

const props = defineProps({
    rooms: {
        type: Object,
        required: true,
    },
});
const header = ref(["ID", "pavadinimas", "prisijungę", "privatus"]);
</script>
