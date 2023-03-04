<template>
    <div
        class="absolute right-10 top-5 z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
        id="user-dropdown"
    >
        <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">
                {{ displayUserName }}</span
            >
        </div>
        <ul class="py-1" aria-labelledby="user-menu-button">
            <li>
                <Link
                    :href="route('app.profile.index')"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                    >Nustatymai</Link
                >
            </li>
            <li>
                <button
                    @click="logout"
                    class="flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                >
                    Atsijungti
                </button>
            </li>
        </ul>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import useRole from "@/Use/useRole.js";
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import { Inertia } from "@inertiajs/inertia";

const { displayRoles } = useRole();

const roles = computed(() => usePage().props.value.roles);

const user = computed(() => usePage().props.value.user);

const displayUserName = computed(() => {
    return displayRoles(roles.value) + " " + user.value.name;
});

const logout = () => {
    Inertia.post(route("logout"));
};
</script>
