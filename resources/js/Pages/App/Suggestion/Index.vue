<template>
    <AppLayout>
        <SuggestionSectionContainer :list="suggestions">
            <template #breadcrumbs>
                <Breadcrumbs :showAppItem="true" currentPage="Pasiūlymai" />
            </template>
            <template #control>
                <div class="flex justify-end">
                    <BaseLink
                        class="mt-4"
                        variant="primary"
                        :href="route('app.suggestions.create')"
                    >
                        <template #leading>
                            <Material icon="add" />
                        </template>
                        <div>Rašyti pasiūlymą</div>
                    </BaseLink>
                </div>
            </template>
            <SuggestionSectionList id="suggestion-container">
                <SuggestionSectionCards :items="suggestions" />
                <template v-if="suggestions.data.length > 0">
                    <infinite-loading @infinite="loadData"></infinite-loading>
                </template>
            </SuggestionSectionList>
        </SuggestionSectionContainer>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import Material from "@/Components/Material.vue";
import BaseLink from "@/Components/Base/Link.vue";
import SuggestionSectionContainer from "@/Components/App/Suggestion/Section/Container.vue";
import SuggestionSectionList from "@/Components/App/Suggestion/Section/List.vue";
import SuggestionSectionCards from "@/Components/App/Suggestion/Section/Cards.vue";
import InfiniteLoading from "vue-infinite-loading";
import useScroll from "@/Use/useScroll.js";
import { ref, onMounted, computed } from "vue";

const props = defineProps({
    suggestions: {
        type: Array,
        required: true,
    },
});
const { scrollToTop } = useScroll();

const page = ref(2);

const loadData = async ($state) => {
    setTimeout(() => {
        axios.get("/app/suggestions?page=" + page.value).then((response) => {
            if (response.data.data.length) {
                page.value += 1;
                props.suggestions.data.push(...response.data.data);
                $state.loaded();
            } else {
                $state.complete();
            }
        });
    }, 1000);
};

onMounted(() => {
    scrollToTop("review-container");
});

const data = computed(() => {
    return items.value;
});
</script>
