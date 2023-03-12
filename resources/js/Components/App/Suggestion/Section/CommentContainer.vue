<template>
    <div>
        <template v-if="slots.breadcrumbs">
            <div class="my-2">
                <slot name="breadcrumbs" />
            </div>
        </template>
        <template v-if="slots.control">
            <slot name="control" />
        </template>
        <div class="w-full p-2 bg-white shadow sm:p-4 dark:bg-gray-800">
            <div
                class="flow-root mt-5 overflow-y-auto h-auto"
                :class="{
                    ' sm:h-[350px]': list?.length > 5,
                }"
            >
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import { useSlots } from "vue";

defineProps({
    list: {
        type: Object,
        required: true,
    },
});

const slots = useSlots();
</script>
