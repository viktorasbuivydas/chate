<template>
    <div>
        <template v-if="slots.breadcrumbs">
            <div class="my-2">
                <slot name="breadcrumbs" />
            </div>
        </template>
        <div
            class="w-full p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-4 dark:bg-gray-800 dark:border-gray-700"
        >
            <div class="max-w-md mx-auto">
                <Notification :canClose="false" class="mt-0">
                    <template #headline> Pranešimas </template>
                    <div>
                        Vieta skirta Jūsų pasiūlymams ir klaidoms pranešti. Už
                        kiekvieną atliktą pasiūlymą gausite 10 patirties taškų,
                        už sutvarkytą klaidą 20 patirties taškų
                    </div>
                </Notification>
            </div>
            <template v-if="slots.control">
                <div class="flex justify-end">
                    <slot name="control" />
                </div>
            </template>

            <div
                class="flow-root mt-5 overflow-y-auto h-auto"
                :class="{
                    ' sm:h-[365px]': list?.data.length > 2,
                }"
            >
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import Notification from "@/Components/Notification.vue";
import { useSlots } from "vue";

defineProps({
    list: {
        type: Object,
        required: true,
    },
});

const slots = useSlots();
</script>
