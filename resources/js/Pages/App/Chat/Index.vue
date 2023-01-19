<template>
    <AppLayout>
        <Breadcrumbs />
        <div class="grid grid-cols-3 gap-5 mt-10 w-full">
            <div class="col-span-2">
                <div class="font-bold text-xl">Chat</div>
                <div class="mt-10"></div>
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
</script>
