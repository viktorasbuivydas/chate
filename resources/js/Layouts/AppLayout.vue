<template>
    <div class="flex dark">
        <Sidebar />
        <div class="flex grow flex-col">
            <Navbar />
            <div class="flex">
                <div class="p-2 sm:p-5 sm:pb-0 flex grow flex-col">
                    <slot />
                </div>
                <Aside :show-online="showOnline" :key="route().current()" />
            </div>
        </div>
    </div>
</template>

<script setup>
import Sidebar from "@/Components/Sidebar.vue";
import Navbar from "@/Components/Navbar.vue";
import Aside from "@/Components/Aside.vue";
defineProps({
    showOnline: {
        type: Boolean,
        default: true,
    },
});
</script>
