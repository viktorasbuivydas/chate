<template>
    <div class="relative grid grid-cols-5 sm:grid-cols-3 gap-x-2">
        <div class="overflow-y-auto max-h-[calc(100vh-80px)]">
            <div class="flex flex-col w-full bg-gray-800 p-2 sm:p-3 space-y-2">
                <slot name="aside" />
            </div>
        </div>
        <div
            id="chat-container"
            class="col-span-4 sm:col-span-2 max-h-screen flex flex-col overflow-y-auto"
        >
            <div>
                <div class="min-h-[calc(100vh-140px)] bg-gray-800 p-2">
                    <div
                        class="max-w-5xl mx-auto space-y-6 grid grid-cols-1 text-gray-500"
                    >
                        <slot name="messages" />
                    </div>
                </div>
            </div>
            <div class="flex">
                <slot name="input" />
            </div>
        </div>
    </div>
</template>
