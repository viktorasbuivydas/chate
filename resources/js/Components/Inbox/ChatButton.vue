<template>
    <button
        @click="$emit('selectConversation', item)"
        class="flex justify-center sm:justify-start space-x-0 sm:space-x-2 p-1 sm:p-2 hover:bg-gray-500 text-gray-500 hover:text-gray-300"
        :class="{
            'bg-gray-500 text-gray-300': selectedConversation === item.uuid,
        }"
    >
        <div>
            <img
                src="https://ui-avatars.com/api/?name=V&color=7F9CF5&background=EBF4FF"
                class="rounded-full"
            />
        </div>
        <div class="hidden sm:flex flex-col space-y-1 text-left">
            <div class="font-bold text-white">{{ item.message.user.name }}</div>
            <div class="text-sm text-gray-400">
                {{ item.message.content }}
            </div>
        </div>
    </button>
</template>
<script setup>
import { defineEmits } from "vue";
defineProps({
    item: {
        type: Object,
        required: true,
    },
    selectedConversation: {
        type: Object,
        required: true,
    },
});

const emit = defineEmits(["selectConversation"]);
</script>
