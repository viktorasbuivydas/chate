<template>
    <div class="place-self-start relative" :class="settings.wrapper">
        {{ name }}
        <div class="flex items-center space-x-2">
            <div v-if="type === 'receiver'">
                <button>
                    <Material icon="more_vert" />
                </button>
                <More v-if="openedMore" />
            </div>
            <div
                class="text-white p-2 rounded-2xl rounded-tl-none"
                :class="settings.bg"
            >
                <MentionUser :content="content" />
            </div>
            <div v-if="type !== 'receiver'">
                <button>
                    <Material icon="more_vert" />
                </button>
                <More v-if="openedMore" />
            </div>
        </div>
    </div>
</template>
<script setup>
import { computed } from "vue";
import Material from "@/Components/Material.vue";
import MentionUser from "@/Components/Chat/MentionUser.vue";
import More from "@/Components/Chat/More.vue";

const props = defineProps({
    type: {
        type: String,
        default: "sender",
    },
    name: {
        type: String,
        default: "John Doe",
    },
    content: {
        type: String,
        default: "Hello World",
    },
});

const settings = computed(() => {
    let classes = {
        wrapper: "place-self-start relative",
        bg: "bg-indigo-500",
    };

    if (props.type === "mentioning") {
        classes = {
            wrapper: classes.wrapper,
            bg: "bg-yellow-500",
        };
    }

    if (props.type === "receiver") {
        classes = {
            wrapper: "place-self-end text-right text-right",
            bg: "bg-blue-500",
        };
    }

    return classes;
});
</script>
