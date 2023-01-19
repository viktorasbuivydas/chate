<template>
    <div
        class="p-5 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700"
    >
        <div
            class="font-normal text-gray-700 dark:text-gray-400 flex flex-col space-y-2"
        >
            <div class="text-xl font-bold">
                <slot name="headline" />
            </div>
            <slot />
        </div>
    </div>
</template>
