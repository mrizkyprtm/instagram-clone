<script setup>
import { Bookmark, Heart, MessageCircle, Send } from 'lucide-vue-next';
</script>

<template>
    <div class="flex flex-col items-center justify-start">
        <div class="mb-4 w-full max-w-[470px] border-b border-b-gray-300">
            <!-- Post Header -->
            <div class="flex items-center justify-between pb-3">
                <div class="flex items-center space-x-2">
                    <img
                        src="https://randomuser.me/api/portraits/men/22.jpg"
                        class="h-8 w-8 rounded-full object-cover"
                    />
                    <p class="text-sm text-gray-500">
                        <span class="font-extrabold text-black">
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
                <div class="mb-2 flex justify-between">
                    <div class="flex space-x-4">
                        <button class="hover:text-gray-500" title="Like">
                            <Heart />
                        </button>
                        <button class="hover:text-gray-500" title="Comment">
                            <MessageCircle />
                        </button>
                        <button class="hover:text-gray-500" title="Share">
                            <Send />
                        </button>
                    </div>
                    <button class="hover:text-gray-500" title="Save">
                        <Bookmark />
                    </button>
                </div>

                <!-- Likes -->
                <div class="mb-1 text-sm font-extrabold">1 likes</div>

                <!-- Caption -->
                <div class="mb-1.5 text-sm">
                    <span class="font-extrabold"> m_rizkyprtm </span>
                    lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem
                    ipsum dolor sit amet ✨
                </div>

                <!-- Comments -->
                <div class="text-sm text-gray-400">View all 1 comments</div>
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
