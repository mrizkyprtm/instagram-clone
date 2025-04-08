<script setup>
import SideNav from '@/Components/SideNav.vue';
import TopNav from '@/Components/TopNav.vue';

// console.log($page);
</script>

<template>
    <div id="MainLayout" class="flex h-screen w-full flex-col md:flex-row">
        <!-- top navigation -->
        <TopNav />

        <!-- side navigation -->
        <SideNav />

        <div class="h-full w-full">
            <slot />
        </div>
    </div>
</template>
