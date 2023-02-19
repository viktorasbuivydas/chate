<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
        >
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="px-6 py-3" v-for="item in header">
                        {{ item }}
                    </th>
                    <th scope="col" class="px-6 py-3" v-if="slots.actions">
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
                        v-for="(item, index) in Object.values(row)"
                        scope="row"
                        class="px-6 py-4 font-medium whitespace-nowrap"
                        :class="{ 'text-white': index === 0 }"
                    >
                        <template v-if="typeof item === 'boolean'">
                            <Material
                                icon="check"
                                class="text-green-500"
                                v-if="item"
                            />
                            <Material
                                icon="close"
                                class="text-red-500"
                                v-else
                            />
                        </template>
                        <template v-else>
                            {{ item }}
                        </template>
                    </th>
                    <td
                        class="flex px-6 py-4 text-right justify-end"
                        v-if="slots.actions"
                    >
                        <slot name="actions" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { useSlots } from "vue";
import Material from "@/Components/Material.vue";
defineProps({
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
});
const slots = useSlots();
</script>
