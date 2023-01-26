<template>
    <GuestLayout>
        <!-- Breadcrumb -->
        <div>
            <AuthContainer>
                <Notification class="mx-auto">
                    <template #headline> Pranešimas </template>
                    Sveiki atvykę į uždarą programuotojų, dizainerių platformą.
                    Norėdami gauti pakvietimą, susisiekite su vienu iš projekte
                    esančių vartotojų.
                </Notification>
                <div class="text-center font-bold text-3xl text-white">
                    Prisijungimas
                </div>
                <form @submit.prevent="submit" class="space-y-2">
                    <BaseInputGroup>
                        <BaseLabel>El. pašto adresas</BaseLabel>
                        <BaseInput
                            type="text"
                            icon="mail"
                            :required="true"
                            v-model="form.email"
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

                    <div class="flex w-full">
                        <BaseButton type="submit" class="mt-5"
                            >Prisijungti</BaseButton
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
import Material from "@/Components/Material.vue";
import InputError from "@/Components/InputError.vue";
import Notification from "@/Components/Notification.vue";
import { ref, computed } from "vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const showPassword = ref(false);

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};

const passwordType = computed(() => {
    return showPassword.value ? "text" : "password";
});

const togglePassword = () => {
    showPassword.value = !showPassword.value;
};
</script>
