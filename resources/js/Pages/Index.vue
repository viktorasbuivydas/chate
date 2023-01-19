<template>
    <GuestLayout>
        <!-- Breadcrumb -->
        <div>
            <AuthContainer>
                <Notification class="mx-auto">
                    <template #headline> Administracijos pranešimas </template>
                    Sveiki atvykę į uždarą programuotojų, dizainerių platformą.
                    Norėdami gauti pakvietimą, susisiekite su vienu iš projekte
                    esančių vartotojų.
                </Notification>
                <div class="text-center font-bold text-3xl text-white">
                    Prisijungimas
                </div>
                <BaseInputGroup>
                    <BaseLabel>El. pašto adresas</BaseLabel>
                    <BaseInput type="text" />
                    <BaseFormError>Wrong credentials!</BaseFormError>
                </BaseInputGroup>
            </AuthContainer>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import AuthContainer from "@/Components/Auth/Container.vue";
import Notification from "@/Components/Notification.vue";
import BaseInputGroup from "@/Components/Base/InputGroup.vue";
import BaseInput from "@/Components/Base/Input.vue";
import BaseLabel from "@/Components/Base/Label.vue";
import BaseFormError from "@/Components/Base/FormError.vue";
</script>
