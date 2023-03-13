<template>
    <AppLayout>
        <SuggestionSectionCommentContainer :list="comments.data">
            <template #breadcrumbs>
                <Breadcrumbs :showAppItem="true" currentPage="Pasiūlymai" />
            </template>
            <template #control>
                <div
                    class="w-full p-2 bg-white rounded-tl-lg rounded-tr-lg shadow sm:p-4 dark:bg-gray-800"
                >
                    <div class="mb-2">
                        <SuggestionSectionCard
                            :item="suggestion.data"
                            :hide-comments="true"
                        />
                    </div>
                    <form @submit.prevent="submit">
                        <BaseLabel>Komentaras</BaseLabel>
                        <BaseTextarea
                            class="w-full mt-2"
                            v-model="form.comment"
                        />
                        <InputError
                            :message="form.errors.content"
                            class="mt-2"
                        />
                        <div class="flex justify-end mt-4">
                            <BaseLink
                                variant="secondary"
                                :href="route('app.suggestions.index')"
                            >
                                Uždaryti
                            </BaseLink>
                            <BaseButton type="submit" class="ml-3">
                                Rašyti
                            </BaseButton>
                        </div>
                    </form>
                </div>
            </template>
            <div class="flex flex-col space-y-4">
                <SuggestionSectionCommentCard
                    v-for="item in comments.data"
                    :item="item"
                />
                <infinite-loading @infinite="loadData"></infinite-loading>
            </div>
        </SuggestionSectionCommentContainer>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import BaseLabel from "@/Components/Base/Label.vue";
import BaseTextarea from "@/Components/Base/Textarea.vue";
import BaseButton from "@/Components/Base/Button.vue";
import BaseLink from "@/Components/Base/Link.vue";
import InputError from "@/Components/InputError.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import SuggestionSectionCommentCard from "@/Components/App/Suggestion/Section/CommentCard.vue";
import SuggestionSectionCard from "@/Components/App/Suggestion/Section/Card.vue";
import SuggestionSectionCommentContainer from "@/Components/App/Suggestion/Section/CommentContainer.vue";
import InfiniteLoading from "vue-infinite-loading";
import useToast from "@/Use/useToast.js";
import { getCurrentInstance } from "vue";
import { ref } from "vue";

const props = defineProps({
    suggestion: {
        type: Object,
        required: true,
    },
    comments: {
        type: Array,
        required: true,
    },
});

const { getToastInstance, pushSuccessToast } = useToast();
const instance = getToastInstance(getCurrentInstance());
const page = ref(2);

const form = useForm({
    comment: "",
});

const submit = () => {
    form.post(route("app.suggestions.comments.store", props.suggestion.data), {
        onSuccess: () => {
            pushSuccessToast("Komentaras sėkmingai įrašytas", instance);
            form.reset();
        },
    });
};

const loadData = async ($state) => {
    setTimeout(() => {
        axios
            .get(
                "/app/suggestions/" +
                    props.suggestion.data.id +
                    "/comments?page=" +
                    page.value
            )
            .then((response) => {
                if (response.data.data.length) {
                    page.value += 1;

                    props.comments.data.push(...response.data.data);
                    $state.loaded();
                } else {
                    $state.complete();
                }
            });
    }, 1000);
};
</script>
