<template>
    <AdminLayout>
        <Breadcrumbs />
        <div class="grid grid-cols-3 gap-5 mt-10 w-full">
            <div class="col-span-2">
                <div class="font-bold text-xl">Pokalbių valdymas</div>
                <div class="mt-2">
                    <AdminChatTabs />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import AdminChatTabs from "@/Components/Admin/Chat/Tabs/Index.vue";
</script>
