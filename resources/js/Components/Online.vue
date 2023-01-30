<template>
    <Card>
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
</template>
<script setup>
import Card from "@/Components/Card.vue";
import Material from "@/Components/Material.vue";
</script>
