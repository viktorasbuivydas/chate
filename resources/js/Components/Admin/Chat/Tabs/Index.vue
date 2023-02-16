<template>
    <div>
        <BaseTabs>
            <BaseTabsItem
                :active-tab="true"
                :disabled="disabledTab"
                icon="chat_bubble"
            >
                Pokalbių kanalai
            </BaseTabsItem>
            <BaseTabsItem
                :active-tab="false"
                :disabled="disabledTab"
                icon="chat"
            >
                Pokalbiai
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
