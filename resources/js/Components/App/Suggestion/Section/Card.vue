<template>
    <div>
        <div class="flex items-center space-x-4">
            <div class="flex-shrink-0">
                <img
                    class="w-8 h-8 rounded-full"
                    :src="item.user.profile_photo_url"
                    :alt="item.user.name"
                />
            </div>
            <div class="flex-1 min-w-0">
                <p
                    class="text-sm font-medium text-gray-900 truncate dark:text-white"
                >
                    {{ item.user.name }}
                </p>
                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                    {{ item.content }}
                </p>
            </div>
            <div
                class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
            >
                {{ item.created_at }}
            </div>
        </div>
        <div>
            <ul class="flex mt-4 space-x-2">
                <li class="w-full">
                    <button
                        id="stats-tab"
                        data-tabs-target="#stats"
                        type="button"
                        role="tab"
                        aria-controls="stats"
                        aria-selected="true"
                        @click="like(item)"
                        class="flex items-center justify-center w-full space-x-2 p-2 rounded-tl-lg rounded-bl-lg focus:outline-none bg-gray-700 hover:bg-red-400"
                        :class="{
                            'bg-red-400': item.user_rating === true,
                        }"
                    >
                        <Material icon="favorite" />
                        <div>
                            {{ item.positive_rating }}
                        </div>
                    </button>
                </li>
                <li class="w-full">
                    <button
                        id="about-tab"
                        data-tabs-target="#about"
                        type="button"
                        role="tab"
                        aria-controls="about"
                        aria-selected="false"
                        @click="dislike(item)"
                        class="flex items-center justify-center w-full space-x-2 p-2 focus:outline-none bg-gray-700 hover:bg-blue-400 rounded-tr-lg rounded-br-lg"
                        :class="{
                            'bg-blue-400': item.user_rating === false,
                        }"
                    >
                        <Material icon="thumb_down" />
                        <div>
                            {{ item.negative_rating }}
                        </div>
                    </button>
                </li>
            </ul>
        </div>
        <div class="flex justify-center mt-2" v-if="!hideComments">
            <Link :href="route('app.suggestions.show', item)">
                Komentarai ({{ item.comments_count }})
            </Link>
        </div>
    </div>
</template>
<script setup>
import { Link, useForm } from "@inertiajs/inertia-vue3";
import Material from "@/Components/Material.vue";
import useToast from "@/Use/useToast.js";
import { getCurrentInstance } from "vue";

const { getToastInstance, pushSuccessToast } = useToast();
const instance = getToastInstance(getCurrentInstance());

defineProps({
    item: {
        type: Object,
        required: true,
    },
    hideComments: {
        type: Boolean,
        default: false,
    },
});

const form = useForm({
    type: "",
    is_positive: true,
});

const like = (suggestion) => {
    form.type = suggestion.type;
    form.is_positive = true;

    updateRating(suggestion);
};

const dislike = (suggestion) => {
    form.type = suggestion.type;
    form.is_positive = false;

    updateRating(suggestion);
};

const updateRating = (suggestion) => {
    form.post(`/app/suggestions/${suggestion.id}/update-rating`, {
        onSuccess: () => {
            if (form.is_positive) {
                pushSuccessToast("Sėkmingai paspaudėte patinka", instance);
            } else {
                pushSuccessToast("Sėkmingai paspaudėte nepatinka", instance);
            }
        },
    });
};
</script>
