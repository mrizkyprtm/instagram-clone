<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import HeaderSection from '@/Pages/Profile/Partials/HeaderSection.vue';
import ProfilePostCard from '@/Pages/Profile/Partials/ProfilePostCard.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Clapperboard, Grid, SquareUser } from 'lucide-vue-next';

const footerLinks = [
    { link: '#', name: 'Meta' },
    { link: '#', name: 'About' },
    { link: '#', name: 'Blog' },
    { link: '#', name: 'Jobs' },
    { link: '#', name: 'Help' },
    { link: '#', name: 'API' },
    { link: '#', name: 'Privacy' },
    { link: '#', name: 'Terms' },
    { link: '#', name: 'Locations' },
    { link: '#', name: 'Instagram Lite' },
    { link: '#', name: 'Threads' },
    { link: '#', name: 'Contact Uploading & Non-Users' },
    { link: '#', name: 'Meta Verified' },
    { link: '#', name: 'Meta in Indonesia' },
];
</script>

<template>
    <Head :title="$page.props.auth.user.name" />
    <MainLayout>
        <section class="flex min-h-dvh flex-col">
            <main class="flex flex-grow flex-col justify-center">
                <div
                    class="mx-auto w-full flex-grow pt-[30px] md:w-[calc(100%-40px)] md:max-w-[975px] md:px-5"
                >
                    <!-- header section -->
                    <HeaderSection />

                    <!-- posts section -->
                    <div class="w-full border-y border-gray-200">
                        <!-- posts tab -->
                        <div class="flex justify-center">
                            <ul
                                class="flex h-11 flex-grow items-center justify-center md:h-[52px] md:flex-grow-0 md:gap-16"
                            >
                                <li
                                    class="h-full flex-1 text-xs font-extrabold uppercase tracking-wider"
                                >
                                    <Link
                                        class="-mt-[1px] flex h-full w-full items-center justify-center gap-1 border-t border-gray-900"
                                        href="#"
                                    >
                                        <Grid class="size-6 md:size-3" />
                                        <span class="hidden md:block"
                                            >Posts</span
                                        >
                                    </Link>
                                </li>
                                <li
                                    class="h-full flex-1 text-xs font-extrabold uppercase tracking-wider"
                                >
                                    <Link
                                        class="flex h-full w-full items-center justify-center gap-1 text-gray-500"
                                        href="#"
                                    >
                                        <Clapperboard
                                            class="size-6 md:size-3"
                                        />
                                        <span class="hidden md:block"
                                            >Reels</span
                                        >
                                    </Link>
                                </li>
                                <li
                                    class="h-full flex-1 text-xs font-extrabold uppercase tracking-wider"
                                >
                                    <Link
                                        class="flex h-full w-full items-center justify-center gap-1 text-gray-500"
                                        href="#"
                                    >
                                        <SquareUser class="size-6 md:size-3" />
                                        <span class="hidden md:block">
                                            Tagged
                                        </span>
                                    </Link>
                                </li>
                            </ul>
                        </div>

                        <div class="grid grid-cols-3 gap-1">
                            <template v-for="post in 3" :key="post">
                                <ProfilePostCard />
                            </template>
                        </div>
                    </div>

                    <!-- footer section -->
                    <footer class="hidden w-full py-7 md:block">
                        <ul
                            class="mb-3 flex flex-row flex-wrap justify-center gap-x-4 gap-y-2"
                        >
                            <li
                                class="text-xs text-gray-500"
                                v-for="(link, index) in footerLinks"
                                :key="index"
                            >
                                <a class="hover:underline" :href="link.link">{{
                                    link.name
                                }}</a>
                            </li>
                        </ul>

                        <div
                            class="mb-6 flex flex-row items-center justify-center gap-x-4 text-xs text-gray-500"
                        >
                            <select class="border-none text-xs">
                                <option value="english">English</option>
                                <option value="indonesia">Indonesia</option>
                            </select>
                            <p>&copy; 2025 InstaClone by MoRP.</p>
                        </div>
                    </footer>
                </div>
            </main>
        </section>
    </MainLayout>
</template>
