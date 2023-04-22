<template>
    <AppLayout :show-online="false">
        <InboxSection :messages-count="messages.length">
            <template #aside>
                <InboxChatButton v-for="user in users.data" :item="user" />
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
                <InboxInput :chat="chatRoom" />
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
    user: {
        type: Object,
        default: {},
    },
    users: {
        type: Array,
    },
});
const showInfinityLoaderAfterOneSecond = ref(false);
const { scrollToBottom } = useScroll();
const page = ref(1);
const messages = ref([]);
const selectedUser = ref(null);
onMounted(() => {
    console.log(props.user);
    // scrollToBottom("chat-container");
    selectedUser.value =
        props.user.receivedMessages.length > 0 ? props.user[0] : null;

    setTimeout(() => {
        showInfinityLoaderAfterOneSecond.value = true;
    }, 1000);
});

onUnmounted(() => {});

const user = computed(() => usePage().props.value.auth.user);

const loadData = async ($state) => {
    setTimeout(() => {
        console.log(selectedUser.value);
        // axios
        //     .get("/app/inbox/"?page=" + page.value)
        //     .then((response) => {
        //         if (response.data.data.length) {
        //             page.value += 1;
        //             messages.value.unshift(...response.data.data.reverse());
        //             $state.loaded();
        //         } else {
        //             $state.complete();
        //         }
        //     });
    }, 1000);
};

const isMessageToMe = (message) => {
    return message.includes("@" + user.value.name);
};
</script>
