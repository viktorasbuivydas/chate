<template>
    <div class="flex dark">
        <Sidebar />
        <div class="flex grow flex-col">
            <Navbar />
            <div class="p-5 flex flex-col">
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import Sidebar from "@/Components/Sidebar.vue";
import Navbar from "@/Components/Navbar.vue";
</script>
