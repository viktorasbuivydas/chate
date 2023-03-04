<template>
    <div
        class="absolute right-0 top-5 z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
        id="user-dropdown"
    >
        <ul class="py-1" aria-labelledby="user-menu-button">
            <li>
                <Link
                    :href="route('app.profile.index')"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                    >Nustatymai</Link
                >
            </li>
        </ul>
    </div>
</template>
<script setup></script>
