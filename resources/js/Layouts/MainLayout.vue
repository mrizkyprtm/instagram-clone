<script setup>
import { Instagram, Send } from 'lucide-vue-next';
</script>

<template>
    <div id="MainLayout" class="h-screen w-full">
        <div
            class="sticky z-30 block w-full border-b border-b-gray-300 bg-white px-3 py-2"
        >
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center">
                    <Instagram />
                    <div class="mx-2 h-8 w-px bg-gray-300"></div>
                    <h1 class="text-xl font-semibold">Instagram</h1>
                </div>

                <button class="p-2 text-xl">
                    <Send />
                </button>
            </div>
        </div>

        <slot />
    </div>
</template>
