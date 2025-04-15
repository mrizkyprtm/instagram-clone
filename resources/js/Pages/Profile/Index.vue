<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import {
    Clapperboard,
    Grid,
    LinkIcon,
    Settings,
    SquareUser,
    Verified,
} from 'lucide-vue-next';

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
                    class="mx-auto w-full max-w-[935px] flex-1 border border-gray-200 px-5 pt-7 md:w-[calc(100%-40px)]"
                >
                    <header class="mb-8 grid w-full grid-cols-[1fr_2fr]">
                        <section
                            id="profile_img"
                            class="col-start-1 row-start-1 row-end-5 mr-7 flex flex-1 items-center justify-center"
                        >
                            <div
                                class="flex min-h-[181px] flex-col items-end justify-center"
                            >
                                <!-- <div class="relative h-12 w-full">
                                    <div
                                        class="absolute rounded-xl bg-white p-3 text-xs shadow-md"
                                    >
                                        Note
                                    </div>
                                </div> -->
                                <div
                                    class="h-[150px] w-[150px] overflow-hidden rounded-full"
                                >
                                    <img
                                        class="h-full w-full"
                                        src="https://randomuser.me/api/portraits/men/22.jpg"
                                        alt=""
                                    />
                                </div>
                            </div>
                        </section>
                        <section
                            class="col-start-2 row-start-1 mb-5 mt-auto flex-1"
                        >
                            <div>
                                <div class="flex items-center">
                                    <div class="mr-5 flex items-center gap-1">
                                        <p class="text-xl">
                                            {{
                                                $page.props.auth.user
                                                    ?.username ?? 'm_rizkyprtm'
                                            }}
                                        </p>
                                        <Verified
                                            class="fill-blue-500 stroke-white"
                                            :size="20"
                                        />
                                    </div>

                                    <div class="space-x-2">
                                        <Link :href="route('profile.edit')">
                                            <button
                                                class="rounded-lg bg-gray-200 px-3 py-1.5 text-sm font-extrabold"
                                            >
                                                Edit profile
                                            </button>
                                        </Link>
                                        <button
                                            class="rounded-lg bg-gray-200 px-3 py-1.5 text-sm font-extrabold"
                                        >
                                            View archive
                                        </button>
                                    </div>
                                    <div>
                                        <button class="p-2">
                                            <Settings />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="col-start-2 row-start-2">
                            <ul
                                class="mb-5 flex gap-8 font-light text-gray-500"
                            >
                                <li>
                                    <span class="font-extrabold text-black">
                                        0
                                    </span>
                                    posts
                                </li>
                                <li>
                                    <span class="font-extrabold text-black">
                                        11.5k
                                    </span>
                                    followers
                                </li>
                                <li>
                                    <span class="font-extrabold text-black">
                                        1
                                    </span>
                                    following
                                </li>
                            </ul>
                        </section>
                        <section class="col-start-2 row-start-3 text-sm">
                            <div>
                                <p class="font-extrabold">
                                    {{ $page.props.auth.user.name }}
                                </p>
                            </div>
                            <span>
                                Life is a choice. If you can't make a choice, go
                                to hell. 💀
                            </span>
                            <div class="flex items-center gap-2">
                                <LinkIcon :size="12" />
                                <a
                                    class="font-bold text-blue-900 hover:underline"
                                    href="https://github.com/mrizkyprtm"
                                    target="_blank"
                                >
                                    github.com/mrizkyprtm
                                </a>
                            </div>
                        </section>
                        <section class="col-start-2 row-start-4"></section>
                        <section class="col-start-1 row-start-5 mt-[44px]">
                            Highlights
                        </section>
                        <!-- <section class="col-start-1 row-start-6"></section> -->
                    </header>

                    <div class="w-full border-y border-gray-200">
                        <div class="flex justify-center">
                            <ul
                                class="flex h-[52px] items-center justify-center gap-16"
                            >
                                <li
                                    class="h-full text-xs font-extrabold uppercase tracking-wider"
                                >
                                    <Link
                                        class="-mt-[1px] flex h-full items-center justify-center gap-1 border-t border-gray-900"
                                        href="#"
                                    >
                                        <Grid :size="15" />
                                        <span> Posts </span>
                                    </Link>
                                </li>
                                <li
                                    class="h-full text-xs font-extrabold uppercase tracking-wider"
                                >
                                    <Link
                                        class="flex h-full items-center justify-center gap-1 text-gray-500"
                                        href="#"
                                    >
                                        <Clapperboard :size="15" />
                                        <span>Reels</span>
                                    </Link>
                                </li>
                                <li
                                    class="h-full text-xs font-extrabold uppercase tracking-wider"
                                >
                                    <Link
                                        class="flex h-full items-center justify-center gap-1 text-gray-500"
                                        href="#"
                                    >
                                        <SquareUser :size="15" />
                                        <span> Tagged </span>
                                    </Link>
                                </li>
                            </ul>
                        </div>

                        <div class="grid grid-cols-3 gap-1">
                            <template v-for="post in 3" :key="post">
                                <div class="aspect-[4/5.6]">
                                    <img
                                        class="h-full object-cover"
                                        src="https://images.unsplash.com/photo-1682695796954-bad0d0f59ff1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                        alt=""
                                    />
                                </div>
                            </template>
                        </div>
                    </div>

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
