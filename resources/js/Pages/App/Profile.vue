<template>
    <AppLayout>
        <Breadcrumbs :show-app-item="true" current-page="Profilis" />

        <div class="flex flex-col space-y-4 mt-10 w-full">
            <ProfileTabs class="mb-4" />
            <slot />
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import ProfileTabs from "@/Components/App/Profile/Tabs/Index.vue";
</script>
