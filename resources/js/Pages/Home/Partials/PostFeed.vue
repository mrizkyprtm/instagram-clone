<script setup>
import {
    Bookmark,
    Ellipsis,
    Heart,
    MessageCircle,
    Send,
    Smile,
} from 'lucide-vue-next';
import { Carousel, Navigation, Slide } from 'vue3-carousel';
import 'vue3-carousel/carousel.css';

defineProps({
    post: Object,
});

const carouselConfig = {
    itemsToShow: 1,
    snapAlign: 'start',
    transition: 300,
    preventExcessiveDragging: true,
    clamp: true,
};
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
                            {{ post.user.username }}
                        </span>
                        •
                        <span>{{ post.created_at }}</span>
                    </p>
                </div>
                <button>
                    <Ellipsis />
                </button>
            </div>

            <!-- Post Image -->
            <div class="mb-3">
                <Carousel
                    v-bind="carouselConfig"
                    class="max-h-[585px] min-h-fit overflow-clip rounded border border-gray-200"
                >
                    <Slide v-for="media in post.media" :key="media.id">
                        <video
                            v-if="media.type == 'video'"
                            class="h-full object-cover"
                            :src="`/storage/${media.file_path}`"
                            controls
                        />
                        <img
                            v-else
                            :src="`/storage/${media.file_path}`"
                            alt="Post"
                            class="h-full w-full object-contain"
                        />
                    </Slide>

                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
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
                    <span class="font-extrabold">
                        {{ post.user.username }}
                    </span>
                    {{ post.caption }}
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
