<template>
    <span class="material-symbols-outlined">{{ icon }}</span>
</template>

<script setup>
defineProps({
    icon: {
        type: String,
        required: true,
    },
});
</script>
