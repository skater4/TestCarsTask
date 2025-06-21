<script setup lang="ts">
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import AppSidebarLayout from "@/layouts/app/AppSidebarLayout.vue";

defineOptions({
    layout: AppSidebarLayout
})

const props = defineProps<{
    models: string[]
    selectedModel?: string | null
    yearFrom?: number | null
    yearTo?: number | null
    stats: {
        auction_item_id: number
        year: number
        image: string
        votes_count: number
    }[]
}>()

const selectedModel = ref(props.selectedModel ?? '')
const yearFrom = ref(props.yearFrom ?? '')
const yearTo = ref(props.yearTo ?? '')

function applyFilter() {
    router.get(route('statistic.index'), {
        model: selectedModel.value,
        year_from: yearFrom.value,
        year_to: yearTo.value,
    })
}
</script>

<template>
    <div class="p-6 space-y-6">
        <h1 class="text-2xl font-bold">Статистика голосований</h1>

        <div class="flex gap-4">
            <select v-model="selectedModel" class="border rounded px-3 py-2">
                <option value="">Выберите модель</option>
                <option
                    v-for="(model, i) in models"
                    :key="i"
                    :value="model"
                >
                    {{ model }}
                </option>
            </select>

            <input
                type="number"
                v-model="yearFrom"
                placeholder="Год от"
                class="border rounded px-3 py-2 w-28"
            />
            <input
                type="number"
                v-model="yearTo"
                placeholder="Год до"
                class="border rounded px-3 py-2 w-28"
            />

            <button
                @click="applyFilter"
                class="bg-blue-600 text-white px-4 py-2 rounded"
            >
                Применить
            </button>
        </div>

        <div v-if="stats.length" class="mt-6">
            <div class="mt-4 text-right font-semibold">
                Всего голосов:
                {{
                    stats.reduce((sum, item) => sum + item.votes_count, 0)
                }}
            </div>
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">ID</th>
                    <th class="border px-4 py-2 text-left">Год</th>
                    <th class="border px-4 py-2 text-left">Картинка</th>
                    <th class="border px-4 py-2 text-left">Голоса</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in stats" :key="item.auction_item_id">
                    <td class="border px-4 py-2">{{ item.auction_item_id }}</td>
                    <td class="border px-4 py-2">{{ item.year }}</td>
                    <td class="border px-4 py-2">
                        <img :src="item.image" class="h-16 rounded shadow" />
                    </td>
                    <td class="border px-4 py-2">{{ item.votes_count }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div v-else class="text-gray-500 mt-4">
            Нет данных для отображения.
        </div>
    </div>
</template>
