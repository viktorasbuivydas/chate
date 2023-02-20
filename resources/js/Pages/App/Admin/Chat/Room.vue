<template>
    <AdminLayout>
        <Breadcrumbs />
        <div class="grid grid-cols-1 gap-5 mt-10 w-full">
            <div>
                <div class="font-bold text-xl">Pokalbių valdymas</div>
                <div class="mt-2">
                    <AdminChatTabs />
                </div>
                <div class="mt-4 w-full">
                    <form
                        @submit.prevent="submit"
                        class="flex flex-col space-y-4"
                    >
                        <div>
                            <BaseLabel for="name">
                                Pokalbio pavadinimas</BaseLabel
                            >
                            <BaseInput
                                id="name"
                                v-model="form.name"
                                class="mt-1"
                            />
                            <InputError
                                :message="form.errors.name"
                                class="mt-2"
                            />
                        </div>
                        <div>
                            <BaseCheckbox
                                id="is_private"
                                v-model="form.is_private"
                                class="mt-1"
                            >
                                Privatus pokalbis
                            </BaseCheckbox>
                            <InputError
                                :message="form.errors.is_private"
                                class="mt-2"
                            />
                        </div>
                        <div>
                            <BaseLabel for="password">
                                Pokalbio slaptažodis
                            </BaseLabel>
                            <BaseInput
                                id="password"
                                v-model="form.password"
                                class="mt-1"
                            />
                            <InputError
                                :message="form.errors.password"
                                class="mt-2"
                            />
                        </div>
                        <div class="flex justify-end mt-4">
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
import AdminChatTabs from "@/Components/Admin/Chat/Tabs/Index.vue";
import BaseLabel from "@/Components/Base/Label.vue";
import BaseInput from "@/Components/Base/Input.vue";
import InputError from "@/Components/InputError.vue";
import BaseCheckbox from "@/Components/Base/Checkbox.vue";
import BaseButton from "@/Components/Base/Button.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    room: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    name: props.room.name,
    is_private: props.room.is_private,
});

const submit = () => {
    form.post(route("admin.chat.room.update", props.room.id));
};
</script>
