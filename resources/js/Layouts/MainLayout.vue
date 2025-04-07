<script setup>
import { Link } from '@inertiajs/vue3';
import {
    Clapperboard,
    Compass,
    Heart,
    Home,
    Instagram,
    Menu,
    MessageCircleMore,
    Search,
    SquarePlus,
} from 'lucide-vue-next';
</script>

<template>
    <div id="MainLayout" class="flex h-screen w-full flex-col md:flex-row">
        <div
            class="sticky z-30 block w-full border-b border-b-gray-300 bg-white px-3 py-2.5 md:hidden"
        >
            <div class="flex h-full items-center justify-between md:hidden">
                <!-- Logo -->
                <Link href="/">
                    <Instagram class="hidden" />
                    <!-- <h1 class="text-xl font-semibold">Instagram</h1> -->
                    <img
                        class="w-[108px] text-xl font-semibold xl:block"
                        src="/instagram_logo.svg"
                        alt=""
                    />
                </Link>

                <div class="flex w-72 items-center">
                    <div
                        class="flex w-full items-center rounded-lg bg-gray-100 px-3"
                    >
                        <Search class="size-5 text-gray-500" />
                        <input
                            type="text"
                            name="search"
                            id="search"
                            class="w-full border-none bg-transparent placeholder-gray-400 ring-0 focus:ring-0"
                            placeholder="Search.."
                        />
                    </div>
                    <button class="p-2 text-xl">
                        <Heart />
                    </button>
                </div>
            </div>
        </div>

        <div
            id="sideNav"
            class="hidden h-dvh w-[76px] overflow-y-hidden border-r border-r-gray-300 bg-white p-3 md:block xl:w-[286px]"
        >
            <div class="flex h-full flex-col">
                <div class="flex h-24 justify-center py-3 xl:justify-start">
                    <Link
                        class="h-fit rounded-lg p-3 transition-all hover:bg-gray-100 xl:hover:bg-transparent"
                        href="/"
                    >
                        <Instagram class="block size-6 xl:hidden" />
                        <img
                            class="hidden w-28 text-xl font-semibold xl:block"
                            src="/instagram_logo.svg"
                            alt=""
                        />
                    </Link>
                </div>

                <div class="flex flex-1 flex-col justify-start gap-2">
                    <Link
                        class="flex items-center gap-4 rounded-lg p-3 transition-all hover:bg-gray-100"
                        href="/"
                    >
                        <Home class="block size-6" stroke-width="3" />
                        <span class="hidden font-bold xl:block">Home</span>
                    </Link>
                    <Link
                        class="flex items-center gap-4 rounded-lg p-3 transition-all hover:bg-gray-100"
                        href="/"
                    >
                        <Search class="block size-6" />
                        <span class="hidden xl:block">Search</span>
                    </Link>
                    <Link
                        class="flex items-center gap-4 rounded-lg p-3 transition-all hover:bg-gray-100"
                        href="/"
                    >
                        <Compass class="block size-6" />
                        <span class="hidden xl:block">Explore</span>
                    </Link>
                    <Link
                        class="flex items-center gap-4 rounded-lg p-3 transition-all hover:bg-gray-100"
                        href="/"
                    >
                        <Clapperboard class="block size-6" />
                        <span class="hidden xl:block">Reels</span>
                    </Link>
                    <Link
                        class="flex items-center gap-4 rounded-lg p-3 transition-all hover:bg-gray-100"
                        href="/"
                    >
                        <MessageCircleMore class="block size-6" />
                        <span class="hidden xl:block">Messages</span>
                    </Link>
                    <Link
                        class="flex items-center gap-4 rounded-lg p-3 transition-all hover:bg-gray-100"
                        href="/"
                    >
                        <Heart class="block size-6" />
                        <span class="hidden xl:block">Notifications</span>
                    </Link>
                    <Link
                        class="flex items-center gap-4 rounded-lg p-3 transition-all hover:bg-gray-100"
                        href="/"
                    >
                        <SquarePlus class="block size-6" />
                        <span class="hidden xl:block">Create</span>
                    </Link>
                    <Link
                        class="flex items-center gap-4 rounded-lg p-3 transition-all hover:bg-gray-100"
                        href="/"
                    >
                        <img
                            class="size-6 rounded-full object-cover"
                            src="https://randomuser.me/api/portraits/men/22.jpg"
                            alt=""
                        />
                        <span class="hidden xl:block">Profile</span>
                    </Link>
                </div>
                <div class="flex flex-col justify-start">
                    <button
                        class="flex items-center gap-4 rounded-lg p-3 transition-all hover:bg-gray-100"
                    >
                        <Menu class="block size-6" />
                        <span class="hidden xl:block">More</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="h-full w-full">
            <slot />
        </div>
    </div>
</template>
