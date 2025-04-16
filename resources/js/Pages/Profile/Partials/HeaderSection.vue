<script setup>
import { Link } from '@inertiajs/vue3';
import { LinkIcon, Settings, Verified } from 'lucide-vue-next';
</script>
<template>
    <header
        class="grid w-full grid-cols-[1fr_2fr] max-md:grid-cols-[120px_1fr] md:mb-8"
    >
        <!-- Profile Image -->
        <section
            id="profile_img"
            class="col-start-1 row-start-1 row-end-3 mr-7 flex items-center justify-center max-md:ml-4 md:row-end-5"
        >
            <div
                class="flex flex-col items-end justify-center md:min-h-[181px]"
            >
                <!-- <div class="relative h-12 w-full">
                    <div
                        class="absolute rounded-xl bg-white p-3 text-xs shadow-md"
                    >
                        Note
                    </div>
                </div> -->
                <div
                    class="h-[80px] w-[80px] overflow-hidden rounded-full md:h-[150px] md:w-[150px]"
                >
                    <img
                        class="h-full w-full"
                        src="https://randomuser.me/api/portraits/men/22.jpg"
                        alt="profile_img"
                    />
                </div>
            </div>
        </section>

        <!-- Name -->
        <section class="col-start-2 row-start-1 mt-auto flex-1 md:mb-5">
            <div>
                <div class="flex flex-row items-center max-md:mb-3">
                    <div class="flex items-center gap-1 md:mr-5">
                        <p class="text-lg md:text-xl">
                            {{
                                $page.props.auth.user?.username ?? 'm_rizkyprtm'
                            }}
                        </p>
                        <Verified
                            class="fill-blue-500 stroke-white"
                            :size="20"
                        />
                    </div>

                    <div class="hidden flex-row gap-2 md:flex">
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
                        <button class="px-2 py-3">
                            <Settings />
                        </button>
                    </div>
                </div>
                <div class="flex flex-row gap-2 md:hidden">
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
            </div>
        </section>

        <!-- Account Info -->
        <section
            class="col-span-2 col-start-1 row-start-6 md:col-start-2 md:row-start-2"
        >
            <ul
                class="flex font-light text-gray-500 max-md:justify-around max-md:border-t max-md:border-gray-200 max-md:py-3 md:mb-5 md:space-x-10"
            >
                <li
                    class="flex flex-col items-center justify-center max-md:w-1/3 md:flex-row md:justify-start md:gap-x-1"
                >
                    <span class="font-extrabold text-black"> 43 </span>
                    posts
                </li>
                <li
                    class="flex flex-col items-center justify-center max-md:w-1/3 md:flex-row md:justify-start md:gap-x-1"
                >
                    <span class="font-extrabold text-black"> 11.5k </span>
                    followers
                </li>
                <li
                    class="flex flex-col items-center justify-center max-md:w-1/3 md:flex-row md:justify-start md:gap-x-1"
                >
                    <span class="font-extrabold text-black"> 9.7k </span>
                    following
                </li>
            </ul>
        </section>

        <!-- Biograph -->
        <section
            class="col-span-2 col-start-1 row-start-4 text-sm max-md:mx-4 max-md:mb-5 md:col-start-2 md:row-start-3"
        >
            <div>
                <p class="font-extrabold">
                    {{ $page.props.auth.user.name }}
                </p>
            </div>
            <span>
                Life is a choice. If you can't make a choice, go to hell. 💀
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

        <!-- Highlights -->
        <section
            class="col-span-2 col-start-1 row-start-5 px-3 md:row-start-6 md:mt-[44px]"
        >
            <div class="flex h-[150px] items-center">
                === Highlights section ===
            </div>
        </section>
        <section
            class="col-start-1 row-start-3 mt-6 md:row-start-5 md:mt-11"
        ></section>
    </header>
</template>
