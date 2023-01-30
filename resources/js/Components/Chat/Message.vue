<template>
    <!-- other persone message -->
    <template v-if="type === 'sender'">
        <div class="place-self-start relative">
            {{ name }}
            <div class="flex items-center space-x-2">
                <div
                    class="bg-indigo-500 text-white p-3 rounded-2xl rounded-tl-none"
                >
                    {{ content }}
                </div>
                <div>
                    <button @click="toggleMore">
                        <Material icon="more_vert" />
                    </button>
                    <More v-if="openedMore" />
                </div>
            </div>
        </div>
    </template>
    <!-- sender mentioned me -->
    <template v-if="type === 'mentioning'">
        <div class="place-self-start relative">
            {{ name }}
            <div class="flex items-center space-x-2">
                <div
                    class="bg-yellow-500 text-white p-3 rounded-2xl rounded-tl-none"
                >
                    {{ content }}
                </div>
                <div>
                    <button @click="toggleMore">
                        <Material icon="more_vert" />
                    </button>
                    <More v-if="openedMore" />
                </div>
            </div>
        </div>
    </template>
    <!-- my message -->
    <template v-if="type === 'receiver'">
        <div class="place-self-end text-right relative">
            {{ name }}
            <div class="flex items-center space-x-2">
                <div>
                    <button @click="toggleMore">
                        <Material icon="more_vert" />
                    </button>
                    <More v-if="openedMore" />
                </div>
                <div
                    class="bg-blue-500 text-white p-3 rounded-2xl rounded-tr-none"
                >
                    {{ content }}
                </div>
            </div>
        </div>
    </template>
</template>

<script setup>
import Material from "@/Components/Material.vue";
import { ref } from "vue";
import More from "@/Components/Chat/More.vue";

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

const openedMore = ref(false);

const toggleMore = () => {
    openedMore.value = !openedMore.value;
};
</script>
