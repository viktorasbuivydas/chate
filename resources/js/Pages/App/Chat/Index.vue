<template>
    <AppLayout>
        <div
            class="w-full text-sm mt-2 font-semibold text-gray-300 bg-gray-800 p-3"
        >
            Pokalbiuose: {{ online.length }}
        </div>
        {{ messages.length }}
        <ChatSection>
            <template #messages>
                <!-- chat messages -->
                <div class="w-full flex justify-center">
                    <InfiniteLoading
                        v-if="showInfinityLoaderAfterOneSecond"
                        @infinite="load"
                        class="min-w-[30px] h-[30px]"
                    />
                </div>
                <div class="min-h-[calc(100vh-10px)] bg-gray-800 p-4">
                    <div
                        class="relative max-w-5xl mx-auto space-y-6 grid grid-cols-1 text-gray-500 pb-2"
                    >
                        <template v-for="message in allMessages">
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
import ChatSection from "@/Components/ChatSection.vue";
import ChatMessage from "@/Components/Chat/Message.vue";
import ChatInput from "@/Components/Chat/Input.vue";
import useScroll from "@/Use/useScroll.js";
import InfiniteLoading from "v3-infinite-loading";
import "v3-infinite-loading/lib/style.css";

import { computed, onMounted, onUnmounted, ref } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import axios from "axios";

const showInfinityLoaderAfterOneSecond = ref(false);
const { scrollToBottom } = useScroll();
const users = ref([]);
const page = ref(1);
const messages = ref([]);

onMounted(() => {
    axios.get("/app/chat?page=" + page.value).then((response) => {
        messages.value.splice(0, 0, ...response.data.data);
        page.value++;
    });

    scrollToBottom("chat-container");

    setTimeout(() => {
        showInfinityLoaderAfterOneSecond.value = true;
    }, 1000);

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
            messages.value.push(event);
            scrollToBottom("chat-container");
        });
});

onUnmounted(() => {
    window.Echo.leave("chat");
});

const online = computed(() => users.value);
const user = computed(() => usePage().props.value.auth.user);

const load = async ($state) => {
    if (page.value === null) {
        $state.complete();
        return;
    }

    axios.get("/app/chat?page=" + page.value).then((response) => {
        if (response.data.links.next === null) {
            page.value = null;
        }

        messages.value.splice(0, 0, ...response.data.data);
        $state.loaded();
    });

    page.value++;
};

const allMessages = computed(() => {
    return messages.value.sort((a, b) => {
        return a.id - b.id;
    });
});
</script>
