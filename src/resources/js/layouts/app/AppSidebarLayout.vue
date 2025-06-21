<script setup lang="ts">
import AppContent from '@/components/AppContent.vue';
import AppShell from '@/components/AppShell.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppShell variant="sidebar">

        <AppContent variant="sidebar">
            <!-- ВЕРХНЕЕ МЕНЮ -->
            <header class="bg-white dark:bg-gray-900 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <nav class="flex gap-6 text-sm font-medium">
                    <a href="/vote" class="hover:underline text-gray-800 dark:text-white">Vote</a>
                    <a href="/stats" class="hover:underline text-gray-800 dark:text-white">Statistic</a>
                </nav>
            </header>



            <!-- Контент -->
            <slot />
        </AppContent>
    </AppShell>
</template>
