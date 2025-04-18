<script setup>
import { Head } from '@inertiajs/vue3';
import TopNav from '@/Components/TopNav.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import Story from './Partials/Story.vue';
import PostFeed from './Partials/PostFeed.vue';
import SidebarFeed from './Partials/SidebarFeed.vue';

const props = defineProps({
    posts: Object,
    suggestedUser: Object,
});
</script>

<template>
    <Head title="Home" />

    <MainLayout>
        <section id="home" class="flex min-h-dvh flex-col">
            <nav class="md:hidden">
                <div class="relative m-0 h-[45px] p-0">
                    <TopNav />
                </div>
            </nav>
            <main class="flex flex-grow flex-col justify-center bg-white">
                <div class="flex w-full justify-center pb-14 pt-4 md:pt-0">
                    <div class="w-full max-w-[630px]">
                        <div class="mt-4">
                            <!-- Story -->
                            <Story />

                            <!-- Post -->
                            <template
                                v-for="post in props.posts.data"
                                :key="post.id"
                            >
                                <PostFeed :post="post" />
                            </template>
                        </div>
                    </div>

                    <div
                        class="ml-16 h-dvh w-full max-w-[20rem] max-[1160px]:hidden"
                    >
                        <!-- Sidebar Feed -->
                        <SidebarFeed :suggestUser="suggestedUser" />
                    </div>
                </div>
            </main>
        </section>
    </MainLayout>
</template>
