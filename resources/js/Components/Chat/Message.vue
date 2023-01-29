<template>
    <!-- other persone message -->
    <template v-if="type === 'sender'">
        <div class="place-self-start">
            {{ name }}
            <div class="flex items-center space-x-2">
                <div
                    class="bg-indigo-500 text-white p-4 rounded-2xl rounded-tl-none"
                >
                    {{ content }}
                </div>
                <div>
                    <button>
                        <Material icon="more_vert" />
                    </button>
                </div>
            </div>
        </div>
    </template>
    <!-- sender mentioned me -->
    <template v-if="type === 'mentioning'">
        <div class="place-self-start">
            {{ name }}
            <div class="flex items-center space-x-2">
                <div
                    class="bg-yellow-500 text-white p-4 rounded-2xl rounded-tl-none"
                >
                    {{ content }}
                </div>
                <div>
                    <button>
                        <Material icon="more_vert" />
                    </button>
                </div>
            </div>
        </div>
    </template>
    <!-- my message -->
    <template v-if="type === 'receiver'">
        <div class="place-self-end text-right">
            {{ name }}
            <div class="flex items-center space-x-2">
                <div>
                    <button>
                        <Material icon="more_vert" />
                    </button>
                </div>
                <div
                    class="bg-blue-500 text-white p-4 rounded-2xl rounded-tr-none"
                >
                    {{ content }}
                </div>
            </div>
        </div>
    </template>
</template>

<script setup>
import Material from "@/Components/Material.vue";
defineProps({
    content: {
        type: String,
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        required: true,
    },
});
</script>
