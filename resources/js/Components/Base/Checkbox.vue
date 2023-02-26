<template>
    <label
        class="flex space-x-2 items-center ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
    >
        <input
            type="checkbox"
            :value="modelValue"
            :required="required"
            @change="
                $emit('update:modelValue', JSON.parse($event.target.checked))
            "
            :checked="modelValue"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
        />
        <div>
            <slot />
        </div>
    </label>
</template>

<script setup>
import { ref } from "vue";

defineProps({
    placeholder: {
        type: String,
        default: "",
    },
    icon: {
        type: String,
        default: "",
    },
    modelValue: {
        type: Boolean,
        default: false,
    },
    required: {
        type: Boolean,
        default: false,
    },
});

defineEmits(["update:modelValue"]);
</script>
