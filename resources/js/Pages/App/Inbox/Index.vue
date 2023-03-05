<template>
    <AppLayout>
        <div class="w-full text-sm font-semibold text-gray-300 bg-gray-800 p-3">
            <div
                :href="route('app.chat.index')"
                class="flex space-x-2 items-center justify-center text-base font-medium text-gray-500 rounded-lg bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
                <div class="flex space-x-2">
                    <div>Aktyvių -</div>
                    <div class="font-bold">
                        {{ online.length }}
                    </div>
                </div>
            </div>
        </div>
        <ChatSection :messages-count="messages.length">
            <template #messages>
                <!-- chat messages -->
                <div
                    class="min-h-[calc(100vh-10px)] bg-gray-800 p-4"
                    :class="{
                        'min-h-[calc(100vh-500px)]': messages.length < 10,
                    }"
                >
                    <div
                        class="relative max-w-5xl mx-auto space-y-2 grid grid-cols-1 text-gray-500 pb-2"
                    >
                        <infinite-loading
                            direction="top"
                            @infinite="loadData"
                        ></infinite-loading>
                        <template v-for="message in messages">
                            <template v-if="user.name === message.user.name">
                                <ChatMessage
                                    :name="message.user.name"
                                    :content="message.message"
                                    type="receiver"
                                />
                            </template>
                            <template v-else>
                                <template v-if="isMessageToMe(message.message)">
                                    <ChatMessage
                                        :name="message.user.name"
                                        :content="message.message"
                                        type="mentioning"
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
                        </template>
                    </div>
                </div>
            </template>
            <template #input>
                <!-- chat input -->
                <ChatInput :chat="chatRoom" />
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
import InfiniteLoading from "vue-infinite-loading";
import { computed, onMounted, onUnmounted, ref } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import axios from "axios";

const props = defineProps({
    chatRoom: {
        type: Object,
        default: {},
    },
});
const showInfinityLoaderAfterOneSecond = ref(false);
const { scrollToBottom } = useScroll();
const users = ref([]);
const page = ref(1);
const messages = ref([]);

onMounted(() => {
    scrollToBottom("chat-container");

    setTimeout(() => {
        showInfinityLoaderAfterOneSecond.value = true;
    }, 1000);

    window.Echo.join("chat." + props.chatRoom.id)
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
        })
        .listen("ClearChat", (event) => {
            messages.value = [];
        });
});

onUnmounted(() => {
    window.Echo.leave("chat." + props.chatRoom.id);
});

const online = computed(() => users.value);
const user = computed(() => usePage().props.value.auth.user);

const loadData = async ($state) => {
    setTimeout(() => {
        axios
            .get("/app/chat/" + props.chatRoom.uuid + "?page=" + page.value)
            .then((response) => {
                if (response.data.data.length) {
                    page.value += 1;
                    messages.value.unshift(...response.data.data.reverse());
                    $state.loaded();
                } else {
                    $state.complete();
                }
            });
    }, 1000);
};

const isMessageToMe = (message) => {
    return message.includes("@" + user.value.name);
};
</script>
