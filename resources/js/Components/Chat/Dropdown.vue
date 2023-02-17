<template>
    <div
        class="absolute bottom-[50px] text-white w-full overflow-auto h-[150px]"
        :class="{
            'bottom-12 h-auto': users.length < 5,
        }"
    >
        <form>
            <div class="flex" v-for="user in users">
                <button
                    @click="clickUser(user)"
                    class="z-10 flex grow items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                    type="button"
                >
                    {{ user.name }}
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";

const users = ref([]);
const emit = defineEmits();

onMounted(() => {
    axios.get("/app/chat/users").then((response) => {
        users.value = response.data.data;
    });
});

const clickUser = (user) => {
    emit("mention", user);
};
</script>
