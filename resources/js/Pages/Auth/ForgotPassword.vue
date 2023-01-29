<template>
    <GuestLayout>
        <div>
            <AuthContainer>
                <div class="text-center font-bold text-3xl text-white">
                    Slaptažodžio priminimas
                </div>
                <div
                    v-if="status"
                    class="mb-4 font-medium text-sm text-green-600"
                >
                    {{ status }}
                </div>
                <form @submit.prevent="submit" class="space-y-2">
                    <BaseInputGroup>
                        <BaseLabel>El. pašto adresas</BaseLabel>
                        <BaseInput
                            type="text"
                            icon="mail"
                            :required="true"
                            @change="inputChanged"
                            v-model="form.email"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </BaseInputGroup>

                    <div class="flex flex-col w-fit">
                        <ActionMessage
                            :on="ForgotPasswordRequestSentSuccessfully"
                            class="mr-3"
                        >
                            Jeigu el. pašto adresas įvestas teisingai, kelių
                            minučių bėgyje išsiųsime laišką su slaptažodžio
                            atkūrimo nuoroda.
                        </ActionMessage>
                        <div>
                            <BaseButton
                                type="submit"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                                class="mt-5"
                                >Priminti</BaseButton
                            >
                        </div>
                    </div>
                </form>
            </AuthContainer>
        </div>
    </GuestLayout>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import AuthContainer from "@/Components/Auth/Container.vue";
import BaseInputGroup from "@/Components/Base/InputGroup.vue";
import BaseInput from "@/Components/Base/Input.vue";
import BaseLabel from "@/Components/Base/Label.vue";
import BaseButton from "@/Components/Base/Button.vue";
import InputError from "@/Components/InputError.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import { ref } from "vue";

defineProps({
    status: String,
});

const ForgotPasswordRequestSentSuccessfully = ref(false);

const form = useForm({
    email: "",
});

const success = ref(false);

const submit = () => {
    form.post(route("password.email"), {
        onFinish: () => {
            form.reset("email");
            success.value = true;
        },
        onSuccess: () => {
            ForgotPasswordRequestSentSuccessfully.value = true;
        },
    });
};

const inputChanged = () => {
    ForgotPasswordRequestSentSuccessfully.value = false;
    form.clearErrors();
};
</script>
