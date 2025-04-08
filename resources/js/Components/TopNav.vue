<script setup>
import { Link } from '@inertiajs/vue3';
import { Heart, Instagram, Search } from 'lucide-vue-next';
</script>

<template>
    <div
        class="sticky z-30 block w-full border-b border-b-gray-300 bg-white px-3 py-2.5 md:hidden"
    >
        <div class="flex h-full items-center justify-between md:hidden">
            <!-- Logo -->
            <Link href="/">
                <Instagram class="hidden" />
                <img
                    class="w-[108px] xl:block"
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
</template>
