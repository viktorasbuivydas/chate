<template>
    <AppLayout :show-online="false">
        <InboxSection :messages-count="messages.length">
            <template #aside>
                <InboxChatButton v-for="conversation in conversations.data" :item="conversation" @select-conversation="selectConversation(conversation)" :selected-conversation="selectedConversation"/>
            </template>
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
                            <template
                                v-if="user.name === message.receiver.name"
                            >
                                <ChatMessage
                                    :name="message.receiver.name"
                                    :content="message.message"
                                    type="sender"
                                />
                            </template>
                            <template v-else>
                                <template v-if="isMessageToMe(message.message)">
                                    <ChatMessage
                                        :name="message.sender.name"
                                        :content="message.message"
                                        type="receiver"
                                    />
                                </template>
                                <template v-else>
                                    <ChatMessage
                                        :name="message.receiver.name"
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
                <InboxInput :conversation="selectedConversationItem"/>
            </template>
        </InboxSection>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InboxSection from "@/Components/InboxSection.vue";
import ChatMessage from "@/Components/Chat/Message.vue";
import InboxInput from "@/Components/Inbox/Input.vue";
import InboxChatButton from "@/Components/Inbox/ChatButton.vue";
import useScroll from "@/Use/useScroll.js";
import InfiniteLoading from "vue-infinite-loading";
import { computed, onMounted, onUnmounted, ref } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import axios from "axios";

const props = defineProps({
    conversations: {
        type: Array,
    },
});
const showInfinityLoaderAfterOneSecond = ref(false);
const { scrollToBottom } = useScroll();
const page = ref(1);
const messages = ref([]);
const selectedConversation = ref(null);
onMounted(() => {
    // scrollToBottom("chat-container");
    selectedConversation.value = props.conversations.data[0].uuid;
    setTimeout(() => {
        showInfinityLoaderAfterOneSecond.value = true;
    }, 1000);
});

onUnmounted(() => {});

const user = computed(() => usePage().props.value.auth.user);

const loadData = async ($state) => {
    setTimeout(() => {
        axios
            .get("/app/inbox/" + selectedConversation.value + "?page=" + page.value)
            .then((response) => {
                console.log(response.data);
                if (response.data.messages.length) {
                    page.value += 1;
                    messages.value.unshift(...response.data.messages.reverse());
                    $state?.loaded();
                } else {
                    $state?.complete();
                }
            });
    }, 1000);
};

const selectConversation = (conversation) => {
    selectedConversation.value = conversation.uuid;
    page.value = 1;
    messages.value = [];
    loadData();
};

const selectedConversationItem = computed(() => {
    return props.conversations.data.find(
        (conversation) => conversation.uuid === selectedConversation.value
    );
});
const isMessageToMe = (message) => {
    return message.includes("@" + user.value.name);
};
</script>
