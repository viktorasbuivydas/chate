<template>
    <div class="flex dark">
        <AdminSidebar />
        <div class="flex grow flex-col">
            <Navbar />
            <div class="flex">
                <div class="p-5 flex grow flex-col">
                    <slot />
                </div>
                <Aside />
            </div>
        </div>
    </div>
</template>

<script setup>
import AdminSidebar from "@/Components/AdminSidebar.vue";
import Navbar from "@/Components/Navbar.vue";
import Aside from "@/Components/Aside.vue";
</script>
