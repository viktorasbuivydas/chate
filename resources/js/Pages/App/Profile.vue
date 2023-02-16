<template>
    <AppLayout>
        <Breadcrumbs :show-app-item="true" current-page="Profilis" />

        <div class="grid grid-cols-3 gap-5 mt-10 w-full">
            <div class="col-span-2 flex flex-col space-y-4">
                <ProfileTabs class="mb-4" />
                <slot />
            </div>
            <div>
                <Online />
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import Online from "@/Components/Online.vue";
import ProfileTabs from "@/Components/App/Profile/Tabs/Index.vue";
</script>
