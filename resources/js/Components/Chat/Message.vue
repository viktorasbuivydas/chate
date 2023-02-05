<template>
    <template v-if="type === 'sender'">
        <div class="place-self-start relative">
            {{ name }}
            <div class="flex items-center space-x-2">
                <div
                    class="bg-indigo-500 text-white p-2 rounded-2xl rounded-tl-none"
                >
                    {{ filterMessage(content) }}
                </div>
                <div>
                    <button>
                        <Material icon="more_vert" />
                    </button>
                    <More v-if="openedMore" />
                </div>
            </div>
        </div>
    </template>
    <template v-if="type === 'mentioning'">
        <div class="place-self-start relative">
            {{ name }}
            <div class="flex items-center space-x-2">
                <div
                    class="bg-yellow-500 text-white p-3 rounded-2xl rounded-tl-none"
                >
                    <span v-if="toUser(content)">
                        <Link
                            href="/about/"
                            class="text-gray-500 hover:text-gray-600 font-semibold"
                        >
                            {{ toUser(content) }}:
                        </Link> </span
                    >{{ filterMessage(content) }}
                </div>
                <div>
                    <button>
                        <Material icon="more_vert" />
                    </button>
                    <More v-if="openedMore" />
                </div>
            </div>
        </div>
    </template>
    <template v-if="type === 'receiver'">
        <div class="place-self-end text-right relative">
            {{ name }}
            <div class="flex items-center space-x-2">
                <div>
                    <button>
                        <Material icon="more_vert" />
                    </button>
                    <More v-if="openedMore" />
                </div>
                <div
                    class="bg-blue-500 text-white p-2 rounded-2xl rounded-tr-none"
                >
                    {{ filterMessage(content) }}
                </div>
            </div>
        </div>
    </template>
</template>

<script setup>
import Material from "@/Components/Material.vue";
import { ref, computed } from "vue";
import More from "@/Components/Chat/More.vue";
import { usePage, Link } from "@inertiajs/inertia-vue3";

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

const filterMessage = (content) => {
    let message = content;
    if (content.startsWith("@")) {
        content.replace(/@(\w+)/g, (match, p1) => {
            message = message.replace(match + " ", "");
        });
    }
    return message;
};

const toUser = (content) => {
    let user = null;
    content.replace(/@(\w+)/g, (match, p1) => {
        user = p1;
    });

    return user;
};
const user = computed(() => usePage().props.value.auth.user);
</script>
