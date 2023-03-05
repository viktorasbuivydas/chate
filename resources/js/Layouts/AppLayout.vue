<template>
    <div class="flex dark">
        <Sidebar />
        <div class="flex grow flex-col">
            <Navbar />
            <div class="flex">
                <div class="p-5 flex grow flex-col">
                    <slot />
                </div>
                <Aside :key="route().current()" />
            </div>
        </div>
    </div>
</template>

<script setup>
import Sidebar from "@/Components/Sidebar.vue";
import Navbar from "@/Components/Navbar.vue";
import Aside from "@/Components/Aside.vue";
</script>
