<template>
    <GuestLayout>
        <div>
            <AuthContainer>
                <div class="text-center font-bold text-3xl text-white">
                    This is a secure area of the application. Please confirm
                    your password before continuing.
                </div>

                <form @submit.prevent="submit" class="space-y-2">
                    <BaseInputGroup>
                        <BaseLabel>Slaptažodis</BaseLabel>
                        <BaseInput
                            id="password"
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-full"
                            required
                            autocomplete="current-password"
                            autofocus
                            icon="mail"
                            :required="true"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                    </BaseInputGroup>

                    <div class="flex w-full">
                        <BaseButton
                            type="submit"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            class="mt-5"
                            >Patvirtinti</BaseButton
                        >
                    </div>
                </form>
            </AuthContainer>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import AuthContainer from "@/Components/Auth/Container.vue";
import BaseInputGroup from "@/Components/Base/InputGroup.vue";
import BaseInput from "@/Components/Base/Input.vue";
import BaseLabel from "@/Components/Base/Label.vue";
import BaseButton from "@/Components/Base/Button.vue";
import InputError from "@/Components/InputError.vue";

const form = useForm({
    password: "",
});

const passwordInput = ref(null);

const submit = () => {
    form.post(route("password.confirm"), {
        onFinish: () => {
            form.reset();

            passwordInput.value.focus();
        },
    });
};
</script>
