<script setup>
import SideNav from '@/Components/sideNav.vue';
import TopNav from '@/Components/TopNav.vue';
</script>

<template>
    <div id="MainLayout" class="flex h-screen w-full flex-col md:flex-row">
        <!-- top navigation -->
        <TopNav />
        <SideNav />

        <div class="h-full w-full">
            <slot />
        </div>
    </div>
</template>
