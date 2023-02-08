<template>
    <div class="flex dark">
        <AdminSidebar />
        <div class="flex grow flex-col">
            <Navbar />
            <div class="p-5 flex flex-col">
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import AdminSidebar from "@/Components/AdminSidebar.vue";
import Navbar from "@/Components/Navbar.vue";
</script>
