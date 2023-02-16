<template>
    <div>
        <BaseTabs>
            <BaseTabsItem
                :active-tab="isActive('app.profile.index')"
                :link="route('app.profile.index')"
                icon="person"
            >
                Profilis
            </BaseTabsItem>
            <BaseTabsItem
                :active-tab="isActive('app.profile.password')"
                :link="route('app.profile.password')"
                icon="lock"
            >
                Slaptažodis
            </BaseTabsItem>
            <BaseTabsItem
                :active-tab="isActive('app.profile.sessions')"
                :link="route('app.profile.sessions')"
                icon="web"
            >
                Sesijos
            </BaseTabsItem>
        </BaseTabs>
    </div>
</template>
<script setup>
import BaseTabs from "@/Components/Base/Tabs.vue";
import BaseTabsItem from "@/Components/Base/Tabs/Item.vue";

const isActive = (tab) => {
    return tab === route().current();
};
</script>
