<template>
    <div>
        <div class="text-center" v-if="icon">
            <Material :icon="icon" class="text-3xl" />
        </div>
        <div class="text-center">
            <slot />
        </div>
    </div>
</template>
<script setup>
import Material from "@/Components/Material.vue";

defineProps({
    icon: {
        type: String,
        required: true,
    },
});
</script>
