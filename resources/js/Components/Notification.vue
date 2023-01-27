<template>
    <div
        class="flex flex-col w-fit p-4 mt-6 rounded-lg bg-blue-50 dark:bg-blue-900"
    >
        <div class="flex items-center justify-center mb-3">
            <span
                class="bg-orange-100 text-orange-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-900"
            >
                <slot name="headline" />
            </span>
        </div>
        <p class="text-sm text-blue-900 dark:text-blue-200">
            <slot />
        </p>
    </div>
</template>
