<template>
    <li>
        <Link
            class="flex space-x-2 p-4 border-b-2 border-transparent rounded-t-lg group"
            :class="{
                'hover:text-secondaryHover hover:border-secondaryHover group':
                    !activeTab && !disabledTab,
                ' text-primary  border-primary group': activeTab,
                'block text-secondary cursor-not-allowed': disabledTab,
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
