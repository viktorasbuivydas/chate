<template>
    <div class="flex dark">
        <div class="flex grow flex-col">
            <GuestNavbar />
            <div class="container mt-5 p-5">
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import GuestNavbar from "@/Components/GuestNavbar.vue";
</script>
