<template>
    <ol class="relative border-l border-gray-200 dark:border-gray-700">
        <div class="text-center font-bold text-xl mb-4">
            Projekto startui reikalingos funkcijos
        </div>
        <li class="mb-10 ml-4" v-for="roadmap in roadmaps">
            <div
                class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"
            ></div>

            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ roadmap.title }}
            </h3>
            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                {{ roadmap.description }}
            </p>
            <ul class="flex flex-col mt-2">
                <li
                    v-for="item in roadmap.items"
                    class="flex space-y-1 space-x-2 items-center"
                >
                    <div class="flex items-center">
                        <Material
                            icon="done"
                            v-if="item.done"
                            class="text-green-500"
                        />
                        <Material icon="close" v-else class="text-red-500" />
                    </div>
                    <div>{{ item.title }}</div>
                </li>
            </ul>
        </li>
    </ol>
</template>
<script setup>
import { ref } from "vue";
import Material from "@/Components/Material.vue";

const roadmaps = ref([
    {
        title: "Autentifikacija",
        description:
            "Visos reikiamos funkcijos susijusios su autentifikacija, registracija, slaptažodžio atstatymas ir panašiai.",
        items: [
            {
                title: "Prisijungimas",
                done: true,
            },
            {
                title: "Slaptažodžio atstatymas",
                done: true,
            },
            {
                title: "Slaptažodžio keitimas",
                done: true,
            },
            {
                title: "Prašymas gauti kodą",
                done: false,
            },
        ],
    },
    {
        title: "Vartotojo profilis",
        description:
            "Visos funkcijos, kurios reikalingos pilnam paskyros valdymui.",
        items: [
            {
                title: "Profilio informacijos keitimas",
                done: true,
            },
            {
                title: "Profilio nuotraukos keitimas",
                done: false,
            },
            {
                title: "Slaptažodžio keitimas",
                done: true,
            },
            {
                title: "Projektų sąrašo valdymas",
                done: false,
            },
            {
                title: "Profilio aprašymo keitimas",
                done: false,
            },
        ],
    },
    {
        title: "PM",
        description:
            "Visos funkcijos, kurios reikalingos žinučių siuntimui ir gavimui.",
        items: [
            {
                title: "Žinučių siuntimas",
                done: false,
            },
            {
                title: "Žinučių gavimas",
                done: false,
            },
            {
                title: "Žinučių archyvavimas",
                done: false,
            },
            {
                title: "Žinučių šalinimas",
                done: false,
            },
            {
                title: "Juodasis sąrašas",
                done: false,
            },
        ],
    },
    {
        title: "Pokalbiai",
        description: "Visos funkcijos, kurios reikalingos pokalbių kanalui",
        items: [
            {
                title: "Žinučių siuntimas",
                done: true,
            },
            {
                title: "Žinučių koregavimas",
                done: false,
            },
            {
                title: "Atsakymas į žinutę",
                done: false,
            },
            {
                title: "Galimybė įrašius @ skirti žinutę tam tikram vartotojui",
                done: false,
            },
            {
                title: "Paveiksliukų/nuotraukų kėlimas",
                done: false,
            },
        ],
    },
    {
        title: "Forumas",
        description: "Visos funkcijos, kurios reikalingos forumui",
        items: [
            {
                title: "Temos kūrimas",
                done: false,
            },
            {
                title: "Žinutės rašymas",
                done: false,
            },
        ],
    },
    {
        title: "Pamokos",
        description:
            "Visos funkcijos, kurios reikalingos pamokų skaitymui ir kūrimui",
        items: [
            {
                title: "Pamokų kūrimas",
                done: false,
            },
            {
                title: "Pamokų skaitymas",
                done: false,
            },
            {
                title: "Pamokų redagavimas",
                done: false,
            },
            {
                title: "Pamokų šalinimas",
                done: false,
            },
        ],
    },
    {
        title: "Statistika",
        description: "Visos funkcijos, kurios reikalingos statistikai",
        items: [
            {
                title: "Vartotojų statistika",
                done: false,
            },
            {
                title: "Parašytų chat/pm žinučių statistika",
                done: false,
            },
            {
                title: "Parašytų forumo žinučių statistika",
                done: false,
            },
            {
                title: "Parašytų pamokų statistika",
                done: false,
            },
            {
                title: "Reputacijos statistika",
                done: false,
            },
        ],
    },
]);
</script>
