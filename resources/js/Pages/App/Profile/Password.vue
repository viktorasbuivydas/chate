<template>
    <Profile>
        <FormSection @submitted="updatePassword">
            <template #title> Slaptažodžio keitimas </template>

            <template #description>
                Rekomenduojame naudoti ilgą, unikalų, atsitiktinį slaptažodį.
            </template>

            <template #form>
                <div class="col-span-6 sm:col-span-4">
                    <BaseLabel for="current_password"
                        >Dabartinis slaptažodis</BaseLabel
                    >
                    <BaseInput
                        id="current_password"
                        ref="currentPasswordInput"
                        v-model="form.current_password"
                        type="password"
                        class="mt-1 block w-full"
                        autocomplete="current-password"
                    />
                    <InputError
                        :message="form.errors.current_password"
                        class="mt-2"
                    />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <BaseLabel for="password">Naujas slaptažodis</BaseLabel>
                    <BaseInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        autocomplete="new-password"
                    />
                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <BaseLabel for="password_confirmation"
                        >Pakartokite slaptažodį</BaseLabel
                    >

                    <BaseInput
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        autocomplete="new-password"
                    />
                    <InputError
                        :message="form.errors.password_confirmation"
                        class="mt-2"
                    />
                </div>
            </template>

            <template #actions>
                <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                    Saved.
                </ActionMessage>

                <BaseButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Save
                </BaseButton>
            </template>
        </FormSection>
    </Profile>
</template>

<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import BaseLabel from "@/Components/Base/Label.vue";
import BaseButton from "@/Components/Base/Button.vue";
import BaseInput from "@/Components/Base/Input.vue";
import Profile from "@/Pages/App/Profile.vue";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const updatePassword = () => {
    form.put(route("user-password.update"), {
        errorBag: "updatePassword",
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
                passwordInput.value.focus();
            }

            if (form.errors.current_password) {
                form.reset("current_password");
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>
