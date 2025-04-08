<script setup>
import SideNav from '@/Components/SideNav.vue';
</script>

<template>
    <div id="MainLayout" class="flex h-screen w-full flex-col md:flex-row">
        <!-- side navigation -->
        <SideNav />

        <div
            class="ml-auto h-full w-full md:w-[calc(100%-76px)] xl:w-[calc(100%-286px)]"
        >
            <slot />
        </div>
    </div>
</template>
