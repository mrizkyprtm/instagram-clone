<script setup>
import SideNav from '@/Components/SideNav.vue';
</script>

<template>
    <div
        id="MainLayout"
        class="relative flex h-screen w-full flex-col md:flex-row"
    >
        <!-- side navigation -->
        <SideNav />

        <div
            class="ml-auto h-full w-full md:w-[calc(100%-4.5rem)] xl:w-[calc(100%-244px)]"
        >
            <slot />
        </div>
    </div>
</template>

<style>
::-webkit-scrollbar {
    width: 16px;
    height: 5px;
}

::-webkit-scrollbar-track {
    background: white;
    border-radius: 100vh;
}
::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
    border: 4px solid white;
}
::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
