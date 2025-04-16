<script setup>
import { Heart, MessageCircle } from 'lucide-vue-next';
</script>
<template>
    <div class="group relative aspect-[4/5.6]">
        <div class="absolute inset-0 z-10 hidden bg-black/50 group-hover:block">
            <div class="flex h-full items-center justify-center gap-x-6">
                <div class="flex items-center gap-1 text-white">
                    <Heart class="size-6" />
                    20
                </div>
                <div class="flex items-center gap-1 text-white">
                    <MessageCircle class="size-6" />
                    20
                </div>
            </div>
        </div>
        <img
            class="h-full object-cover"
            src="https://images.unsplash.com/photo-1682695796954-bad0d0f59ff1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
            alt=""
        />
    </div>
</template>
