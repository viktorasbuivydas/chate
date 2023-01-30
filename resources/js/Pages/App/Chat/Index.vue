<template>
    <AppLayout>
        <Breadcrumbs :show-app-item="true" current-page="Pokalbiai" />

        <ChatSection>
            <template #messages>
                <!-- chat messages -->
                <div class="min-h-[calc(100vh-150px)] bg-gray-800 p-4">
                    <div
                        class="max-w-5xl mx-auto space-y-6 grid grid-cols-1 text-gray-500"
                    >
                        <ChatMessage name="test" content="test" type="sender" />
                        <ChatMessage
                            name="test"
                            content="test"
                            type="receiver"
                        />
                        <ChatMessage
                            name="test"
                            content="heyy. Kaip sekasi?"
                            type="mentioning"
                        />
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
</script>
