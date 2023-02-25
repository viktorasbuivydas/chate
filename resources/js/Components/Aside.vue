<template>
    <aside class="hidden md:flex" aria-label="Aside">
        <div
            class="w-60 h-[calc(100vh-56px)] px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 border border-0 border-r border-gray-200 dark:border-gray-700"
        >
            <Card variant="borderless">
                <template #headline> Prisijungę </template>
                <div class="flex items-center space-x-2">
                    <div
                        class="flex flex-col grow text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                        <a
                            href="#"
                            class="flex items-center space-x-2 w-full px-4 py-2 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white"
                        >
                            <Material icon="computer" />

                            <div>Merkurijus</div>
                        </a>
                    </div>
                </div>
            </Card>
        </div>
    </aside>
</template>

<script setup>
import SidebarItem from "@/Components/Sidebar/Item.vue";
import Card from "@/Components/Card.vue";
import Material from "@/Components/Material.vue";
import { onMounted } from "vue";

onMounted(() => {
    console.log("Online mounted");
});
</script>
