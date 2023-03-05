<template>
    <aside
        :class="{
            'w-64 hidden md:flex': !showOnMobile,
            'w-full flex md:hidden': showOnMobile,
        }"
        aria-label="Sidebar"
    >
        <div
            class="h-screen px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 border border-0 border-r border-gray-200 dark:border-gray-700"
            :class="{
                'w-64': !showOnMobile,
                'w-full': showOnMobile,
            }"
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
                        icon="arrow_back"
                        label="Grįžti į svetainę"
                        :link="route('app.index')"
                    />
                    <SidebarItem
                        icon="chat_bubble"
                        label="Pokalbiai"
                        :link="route('app.admin.chat.index')"
                        active-start="app.admin.chat."
                    />
                    <SidebarItem
                        icon="topic"
                        label="Topic"
                        :link="route('app.admin.topic.index')"
                        active-start="app.admin.topic."
                    />
                </ul>
            </div>
        </div>
    </aside>
</template>

<script setup>
import SidebarItem from "@/Components/Sidebar/Item.vue";

defineProps({
    showOnMobile: {
        type: Boolean,
        default: false,
    },
});
</script>
