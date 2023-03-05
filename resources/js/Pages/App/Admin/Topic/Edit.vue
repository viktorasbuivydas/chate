<template>
    <AdminLayout>
        <Breadcrumbs />
        <div class="flex flex-col space-y-4 mt-10 w-full">
            <div>
                <div class="font-bold text-xl">Topic valdymas</div>
                <div class="mt-4 w-full">
                    <form
                        @submit.prevent="submit"
                        class="flex flex-col space-y-4"
                    >
                        <div>
                            <BaseLabel for="name"> Topic</BaseLabel>
                            <BaseTextarea
                                id="content"
                                v-model="form.content"
                                class="mt-1"
                            />
                            <InputError
                                :message="form.errors.content"
                                class="mt-2"
                            />
                        </div>
                        <div class="flex justify-end mt-4">
                            <BaseLink
                                variant="secondary"
                                :href="route('app.admin.topic.index')"
                            >
                                Atgal
                            </BaseLink>
                            <BaseButton type="submit" class="ml-3">
                                Išsaugoti
                            </BaseButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import BaseLabel from "@/Components/Base/Label.vue";
import InputError from "@/Components/InputError.vue";
import BaseButton from "@/Components/Base/Button.vue";
import BaseLink from "@/Components/Base/Link.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import useToast from "@/Use/useToast.js";
import { getCurrentInstance } from "vue";
import BaseTextarea from "@/Components/Base/Textarea.vue";

const { getToastInstance, pushSuccessToast } = useToast();
const instance = getToastInstance(getCurrentInstance());

const props = defineProps({
    topic: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    content: "",
});

const submit = () => {
    form.patch(route("app.admin.topic.update", props.topic.data.id), {
        onSuccess: () => {
            pushSuccessToast("Topic sėkmingai atnaujintas", instance);
            form.reset();
        },
    });
};
</script>
