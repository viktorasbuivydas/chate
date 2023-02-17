<template>
    <div>
        <span v-if="toUser(content) !== null">
            <Link href="/about/" class="hover:text-gray-200 font-bold">
                @{{ toUser(content) }}
            </Link> </span
        >{{ filterMessage(content) }}
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps(["content"]);

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
        user = p1 + " ";
    });

    if (user !== null) {
        return user;
    }

    return null;
};
</script>
