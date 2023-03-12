<template>
    <div>
        <textarea
            ref="input"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :type="type"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :required="required"
            :placeholder="placeholder"
        >
            <slot />
        </textarea>
        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
            <slot name="leading" />
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";

defineProps({
    type: {
        type: String,
        default: "text",
    },
    placeholder: {
        type: String,
        default: "",
    },
    modelValue: String,
    required: {
        type: Boolean,
        default: false,
    },
});

defineEmits(["update:modelValue"]);
defineExpose({ focus: () => input.value.focus() });

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});
</script>
