<template>
    <GuestLayout>
        <!-- Breadcrumb -->
        <div>
            <AuthContainer>
                <div class="text-center font-bold text-3xl text-white">
                    Gauti kodą
                </div>
                <BaseInputGroup>
                    <BaseLabel>El. pašto adresas</BaseLabel>
                    <BaseInput type="text" />
                </BaseInputGroup>
                <BaseInputGroup>
                    <BaseLabel>Slaptažodis</BaseLabel>
                    <BaseInput type="password" />
                </BaseInputGroup>
                <div class="flex w-full">
                    <BaseButton class="mt-5">Prisijungti</BaseButton>
                </div>
            </AuthContainer>
        </div>
    </GuestLayout>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/inertia-vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import AuthContainer from "@/Components/Auth/Container.vue";
import BaseInputGroup from "@/Components/Base/InputGroup.vue";
import BaseInput from "@/Components/Base/Input.vue";
import BaseLabel from "@/Components/Base/Label.vue";
import BaseButton from "@/Components/Base/Button.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

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
</script>
