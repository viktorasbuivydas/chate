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
                            v-model="form.email"
                            autocomplete="email"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </BaseInputGroup>
                    <BaseInputGroup>
                        <BaseLabel>Slaptažodis</BaseLabel>
                        <BaseInput
                            :type="passwordType"
                            v-model="form.password"
                            icon="password"
                            :required="true"
                        >
                            <template #leading>
                                <button
                                    @click="togglePassword"
                                    class="flex cursor-pointer"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    type="button"
                                >
                                    <Material
                                        v-if="!showPassword"
                                        icon="visibility"
                                    />
                                    <Material v-else icon="visibility_off" />
                                </button>
                            </template>
                        </BaseInput>
                        <InputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                    </BaseInputGroup>

                    <BaseInputGroup>
                        <BaseLabel>Pakartokite slaptažodį</BaseLabel>
                        <BaseInput
                            :type="passwordType"
                            v-model="form.password_confirmation"
                            icon="password"
                            :required="true"
                        >
                            <template #leading>
                                <button
                                    type="button"
                                    @click="togglePassword"
                                    class="flex cursor-pointer"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    <Material
                                        v-if="!showPassword"
                                        icon="visibility"
                                    />
                                    <Material v-else icon="visibility_off" />
                                </button>
                            </template>
                        </BaseInput>
                        <InputError
                            class="mt-2"
                            :message="form.errors.password_confirmation"
                        />
                    </BaseInputGroup>

                    <div class="flex w-full">
                        <BaseButton
                            type="submit"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            class="mt-5"
                            >Pakeisti slaptažodį</BaseButton
                        >
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
import Material from "@/Components/Material.vue";
import { ref, computed } from "vue";

const props = defineProps({
    email: String,
    token: String,
});

const showPassword = ref(false);

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("password.update"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};

const passwordType = computed(() => {
    return showPassword.value ? "text" : "password";
});

const togglePassword = () => {
    showPassword.value = !showPassword.value;
};
</script>
