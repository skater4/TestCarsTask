<script setup lang="ts">
import { ref, watch } from 'vue'
import { router, usePage } from '@inertiajs/vue3'
import AppSidebarLayout from '@/layouts/app/AppSidebarLayout.vue'

defineOptions({
    layout: AppSidebarLayout
})

const props = defineProps<{
    models: string[]
    selectedModel?: string | null
    votePair?: { auction_item_id: number; image_url: string }[]
}>()

const selectedModel = ref<string | null>(props.selectedModel ?? null)
const images = ref(props.votePair ?? [])

watch(selectedModel, (value) => {
    if (value) {
        router.get(route('vote.index'), { model: value }, { preserveState: false })
    }
})

function vote(auctionItemId: number) {
    router.post(route('vote.vote'), {
        auction_item_id: auctionItemId,
        model: selectedModel.value,
    })
}
</script>

<template>
    <div v-if="$page.props.flash?.error" class="text-red-500 border border-red-300 bg-red-50 p-2 rounded">
        {{ $page.props.flash.error }}
    </div>

    <div class="p-6 space-y-4">
        <h1 class="text-xl font-bold">Голосование за авто</h1>

        <select v-model="selectedModel" class="border rounded px-3 py-2">
            <option value="">Выберите модель</option>
            <option
                v-for="(model, index) in models"
                :key="index"
                :value="model"
            >
                {{ model }}
            </option>
        </select>

        <!-- ✅ проверка: если < 2 -->
        <div v-if="images.length > 0 && images.length < 2" class="text-gray-500 italic">
            Нет пары для голосования.
        </div>

        <!-- ✅ если ровно 2 -->
        <div v-if="images.length === 2" class="flex gap-6 mt-4">
            <div
                v-for="(img, i) in images"
                :key="img.auction_item_id"
                class="cursor-pointer border rounded shadow p-2 hover:ring"
                @click="vote(img.auction_item_id)"
            >
                <img :src="img.image_url" class="max-w-xs rounded" />
            </div>
        </div>
    </div>
</template>

