<template>
    <aside class="w-64 hidden md:flex" aria-label="Sidebar">
        <div
            class="w-64 h-screen px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 border border-0 border-r border-gray-200 dark:border-gray-700"
        >
            <a
                href="https://flowbite.com/"
                class="flex items-center pl-2.5 mb-5"
            >
                <img
                    src="https://flowbite.com/docs/images/logo.svg"
                    class="h-6 mr-3 sm:h-7"
                    alt="Flowbite Logo"
                />
                <span
                    class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"
                    >CHATE.LT</span
                >
            </a>
            <div class="flex flex-col">
                <ul class="flex flex-col space-y-2">
                    <SidebarItem
                        icon="home"
                        label="Pagrindinis"
                        :link="route('app.index')"
                        active-start="app.index"
                    />
                    <SidebarItem
                        icon="chat"
                        label="Pokalbiai"
                        route="/app/chat"
                        :link="route('app.chat.index')"
                        active-start="app.chat."
                    />
                    <SidebarItem
                        v-if="canUserSeeAdminContent(roles)"
                        icon="admin_panel_settings"
                        label="Valdymas"
                        :link="route('app.admin.index')"
                        route="/app/cpanel"
                    />
                </ul>
                <Notification v-if="topic">
                    <template #headline> Pranešimas </template>
                    <div>
                        <Link href="/" class="font-bold text-gray-300"
                            >{{ topic.user.name }}:</Link
                        >
                        {{ topic.content }}
                    </div>
                    <div class="text-xs mt-2">
                        (Parašė: {{ topic.updated_at }})
                    </div>
                </Notification>
                <Notification v-else>
                    <template #headline> Pranešimas </template>
                    <div>Pranešimų nėra</div>
                </Notification>
            </div>
        </div>
    </aside>
</template>

<script setup>
import SidebarItem from "@/Components/Sidebar/Item.vue";
import Notification from "@/Components/Notification.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import useRole from "@/Use/useRole.js";

const { canUserSeeAdminContent } = useRole();

const roles = computed(() => {
    return usePage().props.value.roles;
});
const topic = computed(() => {
    return usePage().props.value.topic?.data;
});
</script>
