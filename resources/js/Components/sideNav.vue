<script setup>
import { Link } from '@inertiajs/vue3';
import SideNavLink from './SideNavLink.vue';
import { Instagram, Menu } from 'lucide-vue-next';
</script>
<template>
    <div
        id="sideNav"
        class="hidden h-dvh w-[76px] overflow-y-hidden border-r border-r-gray-300 bg-white p-3 transition-[width] duration-200 ease-out md:block xl:w-[286px]"
    >
        <div class="flex h-full flex-col">
            <div class="flex h-24 justify-center py-3 xl:justify-start">
                <Link
                    class="h-fit rounded-lg p-3 ring-0 transition-all hover:bg-gray-100 focus:outline-0 focus:ring-0 xl:hover:bg-transparent"
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
                <SideNavLink href="/" icon="Home">Home</SideNavLink>
                <SideNavLink href="/search" icon="Search">Search</SideNavLink>
                <SideNavLink href="/explore" icon="Compass">
                    Explore
                </SideNavLink>
                <SideNavLink href="/reels" icon="Clapperboard">
                    Reels
                </SideNavLink>
                <SideNavLink href="/messages" icon="MessageCircleMore">
                    Messages
                </SideNavLink>
                <SideNavLink href="/notifications" icon="Heart">
                    Notifications
                </SideNavLink>
                <SideNavLink href="/post/create" icon="SquarePlus">
                    Create
                </SideNavLink>
                <SideNavLink href="/profile" :is-profile="true">
                    Profile
                </SideNavLink>
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
</template>
