<script setup>
import { Link } from '@inertiajs/vue3';
import SideNavLink from './SideNavLink.vue';
import { Instagram, Menu } from 'lucide-vue-next';
</script>
<template>
    <div
        id="sideNav"
        class="fixed bottom-0 h-fit w-full overflow-y-hidden border-t border-t-gray-300 bg-white p-3 ease-out md:block md:h-dvh md:w-[4.5rem] md:border-r md:border-t-0 md:border-r-gray-300 xl:w-[244px]"
    >
        <div class="flex h-full flex-col">
            <div
                class="hidden h-24 justify-center py-3 md:flex xl:justify-start"
            >
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

            <div
                class="flex flex-1 flex-row justify-around gap-2 md:flex-col md:justify-start"
            >
                <SideNavLink href="/" icon="Home">Home</SideNavLink>
                <SideNavLink class="hidden md:flex" href="/search" icon="Search"
                    >Search</SideNavLink
                >
                <SideNavLink href="/explore" icon="Compass">
                    Explore
                </SideNavLink>
                <SideNavLink href="/reels" icon="Clapperboard">
                    Reels
                </SideNavLink>
                <!-- ==== for mobile ==== -->
                <SideNavLink
                    class="md:hidden"
                    href="/post/create"
                    icon="SquarePlus"
                >
                    Create
                </SideNavLink>
                <!-- ==================== -->
                <SideNavLink href="/messages" icon="MessageCircleMore">
                    Messages
                </SideNavLink>
                <SideNavLink
                    class="hidden md:flex"
                    href="/notifications"
                    icon="Heart"
                >
                    Notifications
                </SideNavLink>
                <SideNavLink
                    class="hidden md:flex"
                    href="/post/create"
                    icon="SquarePlus"
                >
                    Create
                </SideNavLink>
                <SideNavLink href="/profile" :is-profile="true">
                    Profile
                </SideNavLink>
            </div>

            <div class="hidden flex-col justify-start md:flex">
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
