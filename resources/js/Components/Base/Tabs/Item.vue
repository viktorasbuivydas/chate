<template>
    <li>
        <Link
            class="flex space-x-2 p-4 border-b-2 border-transparent rounded-t-lg group"
            :class="{
                'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group':
                    !activeTab && !disabledTab,
                ' text-blue-600  border-blue-600 dark:text-blue-500 dark:border-blue-500 group':
                    activeTab,
                'block text-gray-400 cursor-not-allowed dark:text-gray-500':
                    disabledTab,
            }"
            :href="link"
        >
            <Material :icon="icon" v-if="icon" />
            <div
                :class="{
                    'hidden sm:flex': icon,
                }"
            >
                <slot />
            </div>
        </Link>
    </li>
</template>
<script setup>
import Material from "@/Components/Material.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    activeTab: {
        type: Boolean,
        default: false,
    },
    link: {
        type: String,
        default: "",
    },
    icon: {
        type: String,
        required: false,
    },
    disabledTab: {
        type: Boolean,
        default: false,
    },
});
</script>
