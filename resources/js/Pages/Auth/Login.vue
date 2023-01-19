<template>
    <GuestLayout>
        <!-- Breadcrumb -->
        <div>
            <AuthContainer>
                <div class="text-center font-bold text-3xl text-white">
                    Prisijungimas
                </div>
                <BaseInputGroup>
                    <BaseLabel>El. pašto adresas</BaseLabel>
                    <BaseInput type="text" icon="mail" />
                </BaseInputGroup>
                <BaseInputGroup>
                    <BaseLabel>Slaptažodis</BaseLabel>
                    <BaseInput :type="passwordType" icon="password">
                        <template #leading>
                            <button
                                @click="togglePassword"
                                class="flex cursor-pointer"
                            >
                                <Material
                                    v-if="!showPassword"
                                    icon="visibility"
                                />
                                <Material v-else icon="visibility_off" />
                            </button>
                        </template>
                    </BaseInput>
                </BaseInputGroup>
                <div class="flex w-full">
                    <BaseButton class="mt-5">Prisijungti</BaseButton>
                </div>
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
