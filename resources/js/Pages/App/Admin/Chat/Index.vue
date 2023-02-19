<template>
    <AdminLayout>
        <Breadcrumbs />
        <div class="grid grid-cols-2 gap-5 mt-10 w-full">
            <div>
                <div class="font-bold text-xl">Pokalbių valdymas</div>
                <div class="mt-2">
                    <AdminChatTabs />
                </div>
                <div class="flex flex-col mt-4 space-y-4">
                    <div>
                        <BaseCheckbox
                            id="slow_mode"
                            v-model="form.slow_mode"
                            class="mt-1"
                        >
                            Slow mode
                        </BaseCheckbox>
                        <InputError
                            :message="form.errors.slow_mode"
                            class="mt-2"
                        />
                    </div>
                    <div class="flex flex-col">
                        <BaseLabel for="slow_mode_cooldown">
                            Slow mode cooldown
                        </BaseLabel>
                        <BaseInput
                            id="slow_mode_cooldown"
                            v-model="form.slow_mode_cooldown"
                            class="mt-1"
                        />
                        <InputError
                            :message="form.errors.slow_mode_cooldown"
                            class="mt-2"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import AdminChatTabs from "@/Components/Admin/Chat/Tabs/Index.vue";
import BaseLabel from "@/Components/Base/Label.vue";
import BaseCheckbox from "@/Components/Base/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import BaseInput from "@/Components/Base/Input.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    slow_mode: false,
    slow_mode_cooldown: 5,
});
</script>
