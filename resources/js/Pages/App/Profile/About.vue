<template>
    <AppLayout>
        <Breadcrumbs
            :show-app-item="true"
            :previous-page="previousPage"
            current-page="Profilis"
        />

        <div class="flex flex-col space-y-4 mt-10 w-full">
            <div class="flex flex-col justify-center items-center space-y-2">
                <div class="font-bold text-xl">{{ user.name }}</div>
                <div>
                    <img
                        :src="userData.profile_photo_url"
                        class="w-32 h-32 rounded-full mx-auto"
                    />
                </div>
                <div class="flex flex-col w-full justify-start pt-10">
                    <div>
                        <BaseBadge v-for="role in userRoles">
                            {{ role }}
                        </BaseBadge>
                    </div>
                </div>
            </div>
            <ProfileTabsAbout class="mb-4" />
            <slot />
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import ProfileTabsAbout from "@/Components/App/Profile/Tabs/About.vue";
import useRole from "@/Use/useRole.js";
import { ref, computed } from "vue";
import BaseBadge from "@/Components/Base/Badge.vue";

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
});

const { displayRolesAsString } = useRole();
const userRoles = computed(() => displayRolesAsString(props.user.data.roles));

const userData = computed(() => props.user.data);

const previousPage = ref({
    title: "Profilis",
    route: "/app/profile",
});
</script>
