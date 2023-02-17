<template>
    <div>
        <BaseTabs>
            <BaseTabsItem
                :active-tab="isActive('app.admin.chat.index')"
                :disabled="disabledTab"
                icon="chat"
            >
                Pokalbiai
            </BaseTabsItem>
            <BaseTabsItem
                :active-tab="isActive('app.admin.chat.rooms')"
                :disabled="disabledTab"
                icon="chat_bubble"
            >
                Pokalbių kanalai
            </BaseTabsItem>
        </BaseTabs>
    </div>
</template>
<script setup>
import BaseTabs from "@/Components/Base/Tabs.vue";
import BaseTabsItem from "@/Components/Base/Tabs/Item.vue";
import useTab from "@/Use/useTab.js";

const { isActive } = useTab();

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
