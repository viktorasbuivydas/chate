<template>
    <AppLayout>
        <Breadcrumbs />
        <div class="grid grid-cols-3 gap-5 mt-10 w-full">
            <div class="col-span-2">
                <div class="font-bold text-xl">Naujienos</div>
                <!-- Naujausios pamokos -->
                <!-- Naujausi siuntiniai -->
                <!-- Naujausios forumo temos -->
                <!-- Naujausi irankiai -->
                <!-- Naujausi nariai -->
                <div class="mt-10">hello</div>
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
