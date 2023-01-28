<template>
    <component :is="error" />
</template>

<script setup>
import { computed } from "vue";
import NotFound from "@/Components/Errors/404.vue";
import Forbidden from "@/Components/Errors/403.vue";
import ServerError from "@/Components/Errors/500.vue";
import ServiceUnavailable from "@/Components/Errors/503.vue";

const props = defineProps({ status: Number });

const error = computed(() => {
    return {
        503: ServiceUnavailable,
        500: ServerError,
        404: NotFound,
        403: Forbidden,
    }[props.status];
});
</script>
