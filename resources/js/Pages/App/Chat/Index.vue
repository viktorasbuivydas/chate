<template>
    <AppLayout>
        <Breadcrumbs :show-app-item="true" current-page="Pokalbiai" />
        <div class="text-sm mt-2 text-gray-300">
            Aktyvių: {{ online.length }}
        </div>
        <ChatSection>
            <template #messages>
                <!-- chat messages -->
                <div class="min-h-[calc(100vh-150px)] bg-gray-800 p-4">
                    <div
                        class="max-w-5xl mx-auto space-y-6 grid grid-cols-1 text-gray-500"
                    >
                        <template v-for="message in messages">
                            <template v-if="user.name === message.user.name">
                                <ChatMessage
                                    :name="message.user.name"
                                    :content="message.message"
                                    type="receiver"
                                />
                            </template>
                            <template v-else>
                                <ChatMessage
                                    :name="message.user.name"
                                    :content="message.message"
                                    type="sender"
                                />
                            </template>
                        </template>
                        <!-- <ChatMessage name="test" content="test" type="sender" />
                        <ChatMessage
                            name="test"
                            content="test"
                            type="receiver"
                        />
                        <ChatMessage
                            name="test"
                            content="heyy. Kaip sekasi?"
                            type="mentioning"
                        /> -->
                    </div>
                </div>
            </template>
            <template #input>
                <!-- chat input -->
                <ChatInput />
            </template>
        </ChatSection>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import ChatSection from "@/Components/ChatSection.vue";
import ChatMessage from "@/Components/Chat/Message.vue";
import ChatInput from "@/Components/Chat/Input.vue";

import { defineProps, computed, onMounted, onUnmounted, ref } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const props = defineProps({
    messages: {
        type: Array,
        required: true,
    },
});

const users = ref([]);

onMounted(() => {
    window.Echo.join("chat")
        .here((people) => {
            users.value = people;
        })
        .joining((user) => {
            users.value.push(user);
        })
        .leaving((user) => {
            users.value = users.value.filter((u) => u.id !== user.id);
        })
        .listen("ChatMessageSent", (event) => {
            props.messages.splice(0, 0, event);
        });
});

onUnmounted(() => {
    window.Echo.leave("chat");
});

const online = computed(() => users.value);
const user = computed(() => usePage().props.value.auth.user);
</script>
