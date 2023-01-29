<template>
    <div class="relative mt-2">
        <div
            class="max-h-[calc(100vh-130px)] grid grid-cols-3 gap-5 w-full overflow-y-auto"
        >
            <div class="col-span-3">
                <div class="min-h-[calc(100vh-150px)] bg-gray-800 p-4">
                    <div
                        class="max-w-5xl mx-auto space-y-6 grid grid-cols-1 text-gray-500"
                    >
                        <slot name="messages" />
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <slot name="input" />
            </div>
        </div>
    </div>
</template>
