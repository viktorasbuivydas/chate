<template>
    <nav
        class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900"
    >
        <div
            class="container flex flex-col space-y-5 sm:flex-row items-center justify-between mx-auto"
        >
            <Logo />
            <div class="flex md:order-2">
                <div>
                    <Link
                        type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0"
                    >
                        Gauti registracijos kodą
                    </Link>
                </div>
                <button
                    data-collapse-toggle="navbar-cta"
                    @click="toggle"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700"
                    aria-controls="navbar-cta"
                    aria-expanded="false"
                >
                    <div v-if="!toggled">
                        <span class="sr-only">Open main menu</span>
                        <Material icon="menu" />
                    </div>
                    <div v-else>
                        <Material icon="close" />
                    </div>
                </button>
            </div>
            <!-- mobile menu -->
            <div
                v-if="toggled"
                class="items-center justify-between flex w-full md:hidden md:w-auto md:order-1"
                id="navbar-cta"
            >
                <ul
                    class="flex grow flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                >
                    <li>
                        <Link
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            >Pradinis</Link
                        >
                    </li>
                    <li>
                        <Link
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            >Apie projektą</Link
                        >
                    </li>
                    <li>
                        <Link
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            >Kontaktai</Link
                        >
                    </li>
                </ul>
            </div>
            <div
                class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                id="navbar-cta"
            >
                <ul
                    class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                >
                    <!-- active item -->
                    <!-- <li>
                        <Link
                            class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                            aria-current="page"
                            >Pradinis</Link
                        >
                    </li> -->
                    <li>
                        <Link
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            >Pradinis</Link
                        >
                    </li>
                    <li>
                        <Link
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            >Apie projektą</Link
                        >
                    </li>
                    <li>
                        <Link
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            >Kontaktai</Link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import Logo from "@/Components/Logo.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import Material from "@/Components/Material.vue";

const toggled = ref(false);

const toggle = () => {
    toggled.value = !toggled.value;
};
</script>
