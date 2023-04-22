<template>
    <nav
        class="relative bg-white border-0 border-b dark:border-gray-700 px-2 sm:px-4 py-2.5 dark:bg-gray-800"
    >
        <div
            class="container flex grow flex-wrap items-center justify-between mx-auto"
        >
            <div>
                <button @click="toggleNavbar" class="block md:hidden">
                    <Material
                        v-if="!toggledNavbar"
                        icon="menu"
                        class="text-gray-800 dark:text-gray-200"
                    />
                    <Material
                        v-else
                        icon="close"
                        class="text-gray-800 dark:text-gray-200"
                    />
                </button>
            </div>
            <div
                v-if="toggledNavbar"
                class="absolute z-10 top-[55px] bg-gray-800 w-full left-0 h-full"
            >
                <template v-if="route().current().startsWith('app.admin.')">
                    <AdminSidebar :show-on-mobile="true" />
                </template>
                <template v-else>
                    <Sidebar :show-on-mobile="true" />
                </template>
            </div>
            <div class="flex space-x-4 items-center md:order-2">
                <Link :href="route('app.inbox.index')">
                    <Material icon="chat_bubble" class="text-white" />
                </Link>

                <div class="relative">
                    <button @click="toggleNotifications">
                        <Material icon="notifications" class="text-white" />
                    </button>
                    <NavbarDropdownNotifications
                        v-if="toggledNotifications"
                        v-click-outside="closeNotificationsDropdown"
                    />
                </div>
                <button
                    @click="toggle"
                    type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button"
                    aria-expanded="false"
                    data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom"
                >
                    <span class="sr-only">Open user menu</span>
                    <img
                        class="w-8 h-8 rounded-full"
                        :src="user.profile_photo_url"
                        alt="user photo"
                    />
                </button>
                <NavbarDropdownUser
                    v-if="toggled"
                    v-click-outside="closeUserDropdown"
                />
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref, computed } from "vue";
import Material from "@/Components/Material.vue";
import NavbarDropdownNotifications from "@/Components/Navbar/Dropdown/Notifications.vue";
import NavbarDropdownUser from "@/Components/Navbar/Dropdown/User.vue";
import { usePage, Link } from "@inertiajs/inertia-vue3";
import useToast from "@/Use/useToast.js";
import { onMounted, getCurrentInstance } from "vue";
import Sidebar from "@/Components/Sidebar.vue";
import AdminSidebar from "@/Components/AdminSidebar.vue";

const { getToastInstance, pushErrorToast } = useToast();
const instance = getToastInstance(getCurrentInstance());

const toggled = ref(false);
const toggledNavbar = ref(false);
const toggledNotifications = ref(false);
const toggledMessages = ref(false);

const toggle = () => {
    toggled.value = !toggled.value;
};

const toggleNotifications = () => {
    toggledNotifications.value = !toggledNotifications.value;
};

const toggleMessages = () => {
    toggledMessages.value = !toggledMessages.value;
};

const toggleNavbar = () => {
    toggledNavbar.value = !toggledNavbar.value;
};

const user = computed(() => usePage().props.value.user);
const error = computed(() => usePage().props.value.flash.error);

onMounted(() => {
    if (error.value) {
        pushErrorToast(error.value, instance);
    }
    console.log("mounted");
});

const closeNotificationsDropdown = () => {
    toggledNotifications.value = false;
};

const closeMessagesDropdown = () => {
    toggledMessages.value = false;
};

const closeUserDropdown = () => {
    toggled.value = false;
};
</script>
