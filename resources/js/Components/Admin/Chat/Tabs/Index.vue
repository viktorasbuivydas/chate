<template>
    <div class="border-b border-gray-200 dark:border-gray-700">
        <BaseTabs>
            <BaseTabsItem
                :active-tab="true"
                :disabled="disabledTab"
                label="Pokalbiai"
                route="/app/chat"
            >
                Globalūs nustatymai
            </BaseTabsItem>
            <BaseTabsItem
                :disabled="disabledTab"
                label="Pokalbiai"
                route="/app/chat"
            >
                Užtildyti vartotojai
            </BaseTabsItem>
        </BaseTabs>
    </div>
</template>
<script setup>
import BaseTabs from "@/Components/Base/Tabs.vue";
import BaseTabsItem from "@/Components/Base/Tabs/Item.vue";

defineProps({
    activeTab: {
        type: Boolean,
        default: false,
    },
    disabledTab: {
        type: Boolean,
        default: false,
    },
});
</script>
