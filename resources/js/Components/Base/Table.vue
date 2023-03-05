<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <template v-if="body.length > 0">
            <table
                class="table-auto overwlow-x-auto w-auto sm:w-full text-sm text-left text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th
                            scope="col"
                            class="px-6 py-3"
                            v-for="item in header"
                        >
                            {{ item.name }}
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3"
                            v-if="slots.actions || editAction || deleteAction"
                        >
                            <span class="sr-only">Veiksmai</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="row in body"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                        <th
                            v-for="(item, index) in header"
                            scope="row"
                            class="px-6 py-4 font-medium whitespace-nowrap"
                            :class="{ 'text-white': index === 0 }"
                        >
                            <template v-if="typeof row[item.key] === 'boolean'">
                                <Material
                                    icon="check"
                                    class="text-green-500"
                                    v-if="row[item.key]"
                                />
                                <Material
                                    icon="close"
                                    class="text-red-500"
                                    v-else
                                />
                            </template>
                            <template v-else>
                                {{ row[item.key] }}
                            </template>
                        </th>
                        <td
                            class="flex px-6 py-4 text-right justify-end"
                            v-if="slots.actions || editAction || deleteAction"
                        >
                            <slot name="actions" />

                            <div class="flex space-x-2 items-center">
                                <Link
                                    v-if="editAction"
                                    :href="route(editRoute, row)"
                                    class="text-blue-500 hover:text-blue-200"
                                >
                                    <Material icon="edit" />
                                </Link>
                                <button
                                    v-if="deleteAction"
                                    class="text-red-500 hover:text-red-200"
                                    @click="deleteCallback(row.id)"
                                >
                                    <Material icon="delete" />
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </template>
        <template v-else>
            <div class="flex flex-col justify-center items-center">
                <Material icon="info" class="text-gray-500" />
                <div class="text-gray-500">Nėra duomenų</div>
            </div>
        </template>
    </div>
</template>

<script setup>
import { useSlots } from "vue";
import Material from "@/Components/Material.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { getCurrentInstance } from "vue";
import useToast from "@/Use/useToast.js";

const props = defineProps({
    header: {
        type: Array,
        required: true,
    },
    body: {
        type: Array,
        required: true,
    },
    actionColumn: {
        type: Boolean,
        required: false,
        default: false,
    },
    editAction: {
        type: Boolean,
        required: false,
        default: false,
    },
    deleteAction: {
        type: Boolean,
        required: false,
        default: false,
    },
    deleteRoute: {
        type: String,
        required: false,
        default: "",
    },
    editRoute: {
        type: String,
        required: false,
        default: "",
    },
});
const slots = useSlots();

const { getToastInstance, pushSuccessToast, pushErrorToast } = useToast();
const instance = getToastInstance(getCurrentInstance());

const deleteCallback = (id) => {
    if (props.deleteRoute) {
        Inertia.delete(route(props.deleteRoute, id), {
            onSuccess: () => pushSuccessToast("Sėkmingai ištrinta", instance),
        });
    }
};
</script>
