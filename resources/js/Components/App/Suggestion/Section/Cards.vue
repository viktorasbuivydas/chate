<template>
    <template v-if="items.data.length === 0">
        <div class="flex flex-col items-center justify-center py-2">
            <Material
                icon="sentiment_very_dissatisfied"
                class="text-gray-400"
            />
            <p class="text-gray-400">Nepavyko rasti duomenų</p>
        </div>
    </template>
    <template v-else>
        <li
            v-for="item in items.data"
            class="py-3 sm:py-4 border border-1 border-gray-700 p-2 rounded-md"
        >
            <SuggestionSectionCard :item="item" />
        </li>
    </template>
</template>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import Material from "@/Components/Material.vue";
import SuggestionSectionCard from "@/Components/App/Suggestion/Section/Card.vue";

defineProps({
    items: {
        type: Array,
        required: true,
    },
});
const form = useForm({
    is_positive: true,
});
</script>
