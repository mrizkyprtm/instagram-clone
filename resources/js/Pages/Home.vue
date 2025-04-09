<script setup>
import TopNav from '@/Components/TopNav.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import {
    Bookmark,
    Ellipsis,
    Heart,
    MessageCircle,
    Send,
    Smile,
} from 'lucide-vue-next';
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
                            <!-- <div class="mb-6 h-14 bg-fuchsia-300">
                                Story section
                            </div> -->

                            <!-- Post -->
                            <template v-for="(post, index) in 3" :key="index">
                                <div
                                    class="flex flex-col items-center justify-start"
                                >
                                    <div
                                        class="mb-4 w-full max-w-[470px] border-b border-b-gray-300"
                                    >
                                        <!-- Post Header -->
                                        <div
                                            class="flex items-center justify-between pb-3"
                                        >
                                            <div
                                                class="flex items-center space-x-2"
                                            >
                                                <img
                                                    src="https://randomuser.me/api/portraits/men/22.jpg"
                                                    class="h-8 w-8 rounded-full object-cover"
                                                />
                                                <p
                                                    class="text-sm text-gray-500"
                                                >
                                                    <span
                                                        class="font-extrabold text-black"
                                                    >
                                                        m_rizkyprtm
                                                    </span>
                                                    •
                                                    <span>1d</span>
                                                </p>
                                            </div>
                                            <button>
                                                <Ellipsis />
                                            </button>
                                        </div>

                                        <!-- Post Image -->
                                        <div
                                            class="mb-3 aspect-[4/5] overflow-clip rounded border border-gray-200"
                                        >
                                            <img
                                                src="https://images.unsplash.com/photo-1682695796954-bad0d0f59ff1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                                alt="Post"
                                                class="h-full w-full object-cover"
                                            />
                                        </div>

                                        <!-- Post Actions -->
                                        <div class="">
                                            <div
                                                class="mb-2 flex justify-between"
                                            >
                                                <div class="flex space-x-4">
                                                    <button
                                                        class="hover:text-gray-500"
                                                        title="Like"
                                                    >
                                                        <Heart />
                                                    </button>
                                                    <button
                                                        class="hover:text-gray-500"
                                                        title="Comment"
                                                    >
                                                        <MessageCircle />
                                                    </button>
                                                    <button
                                                        class="hover:text-gray-500"
                                                        title="Share"
                                                    >
                                                        <Send />
                                                    </button>
                                                </div>
                                                <button
                                                    class="hover:text-gray-500"
                                                    title="Save"
                                                >
                                                    <Bookmark />
                                                </button>
                                            </div>

                                            <!-- Likes -->
                                            <div
                                                class="mb-1 text-sm font-extrabold"
                                            >
                                                1 likes
                                            </div>

                                            <!-- Caption -->
                                            <div class="mb-1.5 text-sm">
                                                <span class="font-extrabold">
                                                    m_rizkyprtm
                                                </span>
                                                lorem ipsum dolor sit amet lorem
                                                ipsum dolor sit amet lorem ipsum
                                                dolor sit amet ✨
                                            </div>

                                            <!-- Comments -->
                                            <div class="text-sm text-gray-400">
                                                View all 1 comments
                                            </div>
                                            <!-- <div
                                                  v-for="(
                                                      comment, index
                                                  ) in post.comments.slice(0, 2)"
                                                  :key="index"
                                                  class="mb-1 text-sm"
                                              >
                                                  <span class="font-semibold">{{
                                                      comment.user
                                                  }}</span>
                                                  {{ comment.text }}
                                              </div> -->

                                            <!-- Timestamp -->
                                            <!-- <div
                                                 class="mt-2 text-xs uppercase text-gray-400"
                                             >
                                                 1d
                                             </div> -->
                                        </div>

                                        <!-- Add Comment -->
                                        <div class="mb-2">
                                            <div class="flex items-center">
                                                <input
                                                    type="text"
                                                    placeholder="Add a comment..."
                                                    class="w-full border-none bg-transparent px-0 text-sm placeholder-gray-400 focus:outline-none focus:ring-0"
                                                />
                                                <button
                                                    class="flex items-center gap-2 text-gray-500 hover:text-gray-400"
                                                    title="Emoji"
                                                >
                                                    <Smile size="14" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="ml-16 h-svh w-[319px] max-lg:hidden">
                        <div
                            class="mt-9 flex flex-col items-stretch justify-start self-auto overflow-visible"
                        >
                            <!-- Profile -->
                            <div class="flex w-full flex-col text-nowrap px-4">
                                <div
                                    class="mb-6 flex items-center justify-between"
                                >
                                    <div class="flex items-center space-x-3">
                                        <img
                                            src="https://randomuser.me/api/portraits/men/22.jpg"
                                            alt=""
                                            class="h-11 w-11 rounded-full object-cover"
                                        />
                                        <div>
                                            <div class="text-sm font-extrabold">
                                                m_rizkyprtm
                                            </div>
                                            <div class="text-sm text-gray-400">
                                                Mochamad Rizky Pratama
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        class="text-xs font-extrabold text-blue-500"
                                    >
                                        Switch
                                    </button>
                                </div>
                            </div>

                            <!-- Suggested user -->
                            <div class="mb-2 flex flex-col px-4">
                                <div class="mb-4">
                                    <div
                                        class="mb-4 flex items-center justify-between"
                                    >
                                        <span
                                            class="text-sm font-extrabold text-gray-500"
                                            >Suggested For You</span
                                        >
                                        <button class="text-xs font-extrabold">
                                            See All
                                        </button>
                                    </div>

                                    <div
                                        v-for="suggestion in 5"
                                        :key="suggestion"
                                        class="mb-4 flex items-center justify-between"
                                    >
                                        <div
                                            class="flex items-center space-x-3"
                                        >
                                            <img
                                                src="https://randomuser.me/api/portraits/men/22.jpg"
                                                alt=""
                                                class="h-11 w-11 rounded-full object-cover"
                                            />
                                            <div>
                                                <div
                                                    class="text-sm font-extrabold"
                                                >
                                                    user_name
                                                </div>
                                                <div
                                                    class="text-xs text-gray-400"
                                                >
                                                    Followed by
                                                </div>
                                            </div>
                                        </div>
                                        <button
                                            class="text-xs font-extrabold text-blue-500"
                                        >
                                            Follow
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="mb-2 flex flex-col px-4">
                                <div class="text-xs text-gray-300">
                                    <div class="mb-5 flex flex-wrap gap-1">
                                        <a href="#" class="mr-1 hover:underline"
                                            >About</a
                                        >
                                        <a href="#" class="mr-1 hover:underline"
                                            >Help</a
                                        >
                                        <a href="#" class="mr-1 hover:underline"
                                            >Press</a
                                        >
                                        <a href="#" class="mr-1 hover:underline"
                                            >API</a
                                        >
                                        <a href="#" class="mr-1 hover:underline"
                                            >Jobs</a
                                        >
                                        <a href="#" class="mr-1 hover:underline"
                                            >Privacy</a
                                        >
                                        <a href="#" class="mr-1 hover:underline"
                                            >Terms</a
                                        >
                                        <a href="#" class="mr-1 hover:underline"
                                            >Locations</a
                                        >
                                        <a href="#" class="mr-1 hover:underline"
                                            >Languange</a
                                        >
                                        <a href="#" class="mr-1 hover:underline"
                                            >Meta Verified</a
                                        >
                                    </div>
                                    <div>© 2025 INSTAGRAM CLONE BY MoRP.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </section>
    </MainLayout>
</template>
