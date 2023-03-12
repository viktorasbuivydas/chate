<template>
    <AppLayout>
        <Breadcrumbs />
        <div
            class="w-full p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-4 dark:bg-gray-800 dark:border-gray-700"
        >
            <form @submit.prevent="submit">
                <BaseLabel>Pasiūlymas</BaseLabel>
                <BaseTextarea class="w-full mt-2" v-model="form.content" />
                <InputError :message="form.errors.content" class="mt-2" />
                <div class="flex justify-end mt-4">
                    <BaseLink
                        variant="secondary"
                        :href="route('app.suggestions.index')"
                    >
                        Uždaryti
                    </BaseLink>
                    <BaseButton type="submit" class="ml-3"> Rašyti </BaseButton>
                </div>
            </form>
        </div>
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
import useToast from "@/Use/useToast.js";
import { getCurrentInstance } from "vue";

const { getToastInstance, pushSuccessToast } = useToast();
const instance = getToastInstance(getCurrentInstance());

const form = useForm({
    content: "",
});

const submit = () => {
    form.post(route("app.suggestions.store"), {
        onSuccess: () => {
            pushSuccessToast("Pasiūlymas sėkmingai išsiųstas", instance);
        },
    });
};
</script>
