<script setup>
import TopNav from '@/Components/TopNav.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home" />

    <MainLayout>
        <section id="home" class="flex min-h-dvh flex-col">
            <nav class="relative md:hidden">
                <div class="m-0 h-[45px] p-0">
                    <TopNav />
                </div>
            </nav>
            <main class="flex flex-grow flex-col justify-center">
                <div class="flex w-full justify-center pt-4">
                    <p>Home Page</p>
                </div>
            </main>
        </section>
    </MainLayout>
</template>
