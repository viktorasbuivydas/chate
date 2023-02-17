<template>
    <nav
        class="relative bg-white border border-0 border-b dark:border-gray-700 px-2 sm:px-4 py-2.5 dark:bg-gray-800"
    >
        <div
            class="container flex grow flex-wrap items-center justify-end mx-auto"
        >
            <div class="flex space-x-4 items-center md:order-2">
                <div class="relative">
                    <button @click="toggleMessages">
                        <Material icon="chat_bubble" class="text-white" />
                    </button>
                    <NavbarDropdownMessages v-if="toggledMessages" />
                </div>

                <div class="relative">
                    <button @click="toggleNotifications">
                        <Material icon="notifications" class="text-white" />
                    </button>
                    <NavbarDropdownNotifications v-if="toggledNotifications" />
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
                <NavbarDropdownUser v-if="toggled" />
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref, computed } from "vue";
import Material from "@/Components/Material.vue";
import NavbarDropdownMessages from "@/Components/Navbar/Dropdown/Messages.vue";
import NavbarDropdownNotifications from "@/Components/Navbar/Dropdown/Notifications.vue";
import NavbarDropdownUser from "@/Components/Navbar/Dropdown/User.vue";
import { usePage } from "@inertiajs/inertia-vue3";

const toggled = ref(false);
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

const user = computed(() => usePage().props.value.user);
</script>
