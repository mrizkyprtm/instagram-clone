<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed, inject, ref } from 'vue';
import { Carousel, Navigation, Slide } from 'vue3-carousel';
import 'vue3-carousel/carousel.css';
import {
    Bookmark,
    Ellipsis,
    Heart,
    MessageCircle,
    Send,
    Smile,
} from 'lucide-vue-next';

const { openPostModal } = inject('modal');

const props = defineProps({
    post: Object,
});

const page = usePage();
const authUser = computed(() => page.props.auth.user);

// Safely handle undefined likes array
const isLiked = ref(
    props.post.likes?.some(
        (like) => like.pivot.user_id === authUser.value.id,
    ) ?? false,
);

const likesCount = ref(props.post.likes?.length ?? 0);

const toggleLike = async () => {
    try {
        const response = await axios.post(`/posts/${props.post.id}/like`, {
            post_id: props.post.id,
        });

        isLiked.value = response.data.liked;
        likesCount.value = response.data.likes_count;
    } catch (error) {
        console.error('Error toggling like:', error);
    }
};

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
                    class="flex max-h-[585px] min-h-[400px] items-center overflow-clip rounded border border-gray-200 bg-black"
                >
                    <Slide
                        v-for="media in post.media"
                        :key="media.id"
                        class="h-full"
                    >
                        <video
                            v-if="media.type == 'video'"
                            class="w-full"
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
                        <button
                            class="hover:text-gray-500"
                            title="Like"
                            @click="toggleLike"
                        >
                            <Heart
                                :class="
                                    isLiked ? 'fill-red-500 text-red-500' : ''
                                "
                            />
                        </button>
                        <button
                            class="hover:text-gray-500"
                            title="Comment"
                            @click="openPostModal"
                        >
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
                <div class="mb-1 text-sm font-extrabold">
                    {{ likesCount }} likes
                </div>

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
