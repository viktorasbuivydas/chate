<template>
    <AppLayout>
        <Breadcrumbs :show-app-item="true" current-page="Profilis" />

        <div class="grid grid-cols-3 gap-5 mt-10 w-full">
            <div class="col-span-2 flex flex-col space-y-4">
                <div class="font-bold text-xl">Profilis</div>
                <UpdateProfileInformationForm :user="$page.props.user" />
                <UpdatePasswordForm class="mt-10 sm:mt-0" />

                <LogoutOtherBrowserSessionsForm
                    :sessions="sessions"
                    class="mt-10 sm:mt-0"
                />
            </div>
            <div>
                <Online />
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import Online from "@/Components/Online.vue";
import LogoutOtherBrowserSessionsForm from "@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue";
import UpdatePasswordForm from "@/Pages/Profile/Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "@/Pages/Profile/Partials/UpdateProfileInformationForm.vue";

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>
