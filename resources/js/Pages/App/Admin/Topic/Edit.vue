<template>
    <AdminLayout>
        <Breadcrumbs />
        <div class="flex flex-col space-y-4 mt-10 w-full">
            <div>
                <div class="font-bold text-xl">Pokalbių valdymas</div>
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
                                id="private"
                                v-model="form.private"
                                class="mt-1"
                            >
                                Privatus kambarys
                            </BaseCheckbox>
                            <InputError
                                :message="form.errors.private"
                                class="mt-2"
                            />
                        </div>
                        <div>
                            <BaseCheckbox
                                id="private"
                                v-model="form.active"
                                class="mt-1"
                            >
                                Aktyvus kambarys
                            </BaseCheckbox>
                            <InputError
                                :message="form.errors.active"
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
                            <BaseLink
                                variant="secondary"
                                :href="route('app.admin.chat.rooms')"
                            >
                                Uždaryti
                            </BaseLink>
                            <BaseButton type="submit" class="ml-3">
                                Išsaugoti
                            </BaseButton>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <BaseButton variant="danger" @click="clearChat">
                    <template #leading>
                        <Material icon="delete" />
                    </template>
                    <div>Ištrinti visas žinutes</div>
                </BaseButton>
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
import BaseLink from "@/Components/Base/Link.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import Material from "@/Components/Material.vue";
import useToast from "@/Use/useToast.js";
import { getCurrentInstance } from "vue";

const { getToastInstance, pushSuccessToast } = useToast();
const instance = getToastInstance(getCurrentInstance());

const props = defineProps({
    room: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    name: props.room.name,
    private: props.room.private,
    active: props.room.active,
});

const submit = () => {
    form.patch(route("app.admin.chat.room.update", props.room.id), {
        onSuccess: () => {
            pushSuccessToast("Pokalbis sėkmingai atnaujintas", instance);
        },
    });
};

const clearChat = () => {
    form.delete(route("app.admin.chat.room.clear", props.room.id), {
        onSuccess: () => {
            pushSuccessToast("Pokalbių kambarys sėkmingai išvalytas", instance);
        },
    });
};
</script>
