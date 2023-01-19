<template>
    <aside class="w-64 hidden md:flex" aria-label="Sidebar">
        <div
            class="h-screen px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 border border-0 border-r border-gray-200 dark:border-gray-700"
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
            <ul class="space-y-2">
                <SidebarItem icon="home" label="Pagrindinis" route_url="/app" />
                <SidebarItem
                    icon="chat"
                    label="Pokalbiai"
                    route_url="/app/chat"
                    count="5"
                />
                <SidebarItem
                    icon="forum"
                    label="Forumas"
                    route_url="/app/forum"
                    badge="3/10"
                />
                <SidebarItem
                    icon="folder"
                    label="Failai"
                    route_url="/app/files"
                />
                <SidebarItem
                    icon="school"
                    label="Pamokos"
                    route_url="/app/tutorials"
                />
                <SidebarItem
                    icon="signal_cellular_alt"
                    label="Statistika"
                    route_url="/app/statistic"
                />
                <SidebarItem
                    icon="person"
                    label="Profilis"
                    route_url="/app/profile"
                />
                <SidebarItem
                    icon="settings"
                    label="Nustatymai"
                    route_url="/app/settings"
                />
                <SidebarItem
                    icon="admin_panel_settings"
                    label="Valdymas"
                    route_url="/app/cpanel"
                />
                <SidebarItem
                    icon="toggle_on"
                    label="Prisijungę"
                    route_url="/app/online"
                    count="5"
                />
            </ul>

            <Notification>
                <template #headline> Pranešimas </template>
                <div>
                    WORK IN PROGRESS WORK IN PROGRESS WORK IN PROGRESS WORK IN
                    PROGRESS
                </div>
            </Notification>
        </div>
    </aside>
</template>

<script setup>
import SidebarItem from "@/Components/Sidebar/Item.vue";
import Notification from "@/Components/Notification.vue";

const logout = () => {
    Inertia.post(route("logout"));
};
</script>
