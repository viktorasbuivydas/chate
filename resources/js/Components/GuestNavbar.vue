<template>
    <nav
        class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900"
    >
        <div
            class="container flex flex-col space-y-5 sm:flex-row items-center justify-center mx-auto"
        >
            <Logo />
        </div>
    </nav>
</template>

<script setup>
import Logo from "@/Components/Logo.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import Material from "@/Components/Material.vue";

const toggled = ref(false);

const toggle = () => {
    toggled.value = !toggled.value;
};
</script>
