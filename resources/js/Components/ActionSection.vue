<script setup>
import SectionTitle from "./SectionTitle.vue";
</script>

<template>
    <div class="flex flex-col space-y-2">
        <SectionTitle>
            <template #title>
                <slot name="title" />
            </template>
            <template #description>
                <slot name="description" />
            </template>
        </SectionTitle>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div>
                <slot name="content" />
            </div>
        </div>
    </div>
</template>
