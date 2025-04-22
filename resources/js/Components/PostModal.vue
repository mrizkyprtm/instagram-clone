<script setup>
import { onMounted, onUnmounted, ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import {
    Bookmark,
    Heart,
    MessageCircle,
    MoreHorizontal,
    Send,
    Smile,
    X,
} from 'lucide-vue-next';
import { watchEffect } from 'vue';

const props = defineProps({
    id: Number,
    show: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(['closePostModal']);

const closePostModal = () => {
    emit('closePostModal');
};

const post = ref(null);
const isLoading = ref(false);
const authUser = usePage().props.auth.user;

const getPost = async (id) => {
    try {
        isLoading.value = true;
        const response = await axios.get(`/posts/${id}`);

        post.value = response.data;
    } catch (error) {
        console.error('Error fetching post:', error);
    } finally {
        isLoading.value = false;
    }
};

// Fetch post whenever the ID changes
watchEffect(() => {
    if (props.id) {
        getPost(props.id);
    }
});

const isLiked = ref(false);
const likesCount = ref(0);

watchEffect(() => {
    const likes = post.value?.data?.likes ?? [];

    likesCount.value = likes.length;

    isLiked.value = likes.some((like) => like.pivot.user_id === authUser.id);
});

// Toggle like/unlike
const toggleLike = async () => {
    if (!post.value?.data?.id) return;

    try {
        const response = await axios.post(
            `/posts/${post.value?.data.id}/like`,
            {
                post_id: post.value?.data.id,
            },
        );

        isLiked.value = response.data.liked;
        likesCount.value = response.data.likes_count;
    } catch (error) {
        console.error('Error toggling like:', error);
    }
};

// Add comment on post
const comment = ref('');
const submitComment = async () => {
    if (comment.value.trim() === '') return;
    try {
        const response = await axios.post(
            `/posts/${post.value?.data.id}/comments`,
            {
                body: comment.value,
            },
        );

        post?.value.data.comments.unshift({
            user: {
                username: usePage().props.auth.user.username,
            },
            body: comment.value,
        });

        comment.value = '';
    } catch (error) {
        console.error('Error post comment:', error);
    }
};

onMounted(() => {
    document.body.style.overflow = 'hidden';
});

onUnmounted(() => {
    document.body.style.overflow = '';
});
</script>
<template>
    <div
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/65 text-sm"
        @click.self="closePostModal"
    >
        <!-- Close Button -->
        <button class="absolute right-4 top-4" @click="closePostModal">
            <X class="text-white" :size="25" />
        </button>

        <div class="flex items-center justify-center max-md:p-4">
            <div
                class="h-[calc(100dvh-100px)] min-w-[850px] max-w-6xl overflow-y-scroll rounded bg-white md:h-[calc(100dvh-48px)] md:overflow-hidden"
            >
                <div
                    class="flex h-full w-full flex-col overflow-y-auto md:flex-row"
                >
                    <div class="w-full overflow-hidden bg-black" id="image">
                        <div
                            v-if="!isLoading"
                            class="aspect-[1080/1350] h-full w-full"
                        >
                            <video
                                v-if="post?.data?.media[0]?.type == 'video'"
                                controls
                                :src="`/storage/${post?.data?.media[0]?.file_path}`"
                                alt=""
                                class="w -full h-full object-contain"
                            />
                            <img
                                v-else
                                :src="`/storage/${post?.data?.media[0]?.file_path}`"
                                alt=""
                                class="h-full w-full object-contain"
                            />
                        </div>
                        <div
                            v-else
                            class="flex h-full w-full animate-pulse items-center justify-center bg-gray-200"
                        >
                            Loading..
                        </div>
                    </div>

                    <aside
                        class="h-full w-full md:min-w-[405px] md:max-w-[500px]"
                    >
                        <div class="flex h-full flex-col">
                            <!-- User Info -->
                            <div
                                class="flex items-center justify-between border-b border-gray-200 px-4 py-3"
                            >
                                <div
                                    v-if="!isLoading"
                                    class="flex items-center gap-2"
                                >
                                    <img
                                        class="size-9 rounded-full object-cover"
                                        src="https://placehold.co/40"
                                        alt=""
                                    />
                                    <h1 class="font-semibold">
                                        {{ post?.data?.user?.username }}
                                    </h1>
                                </div>

                                <div v-else class="flex items-center gap-2">
                                    <div
                                        class="size-9 animate-pulse rounded-full bg-gray-200"
                                    ></div>
                                    <div
                                        class="h-4 w-40 animate-pulse bg-gray-200"
                                    ></div>
                                </div>

                                <!-- Dot Icon -->
                                <button class="" title="More options">
                                    <MoreHorizontal class="size-5" />
                                </button>
                            </div>

                            <div
                                class="flex flex-1 flex-col gap-y-4 overflow-y-auto border-b border-gray-200 px-4 py-6"
                            >
                                <!-- caption -->
                                <div class="flex items-start gap-2">
                                    <template v-if="!isLoading">
                                        <img
                                            class="size-9 rounded-full object-cover"
                                            src="https://placehold.co/40"
                                            alt=""
                                        />
                                        <div class="flex flex-col gap-1">
                                            <p class="">
                                                <span class="font-semibold">{{
                                                    post?.data?.user?.username
                                                }}</span>
                                                {{ post?.data?.caption }}
                                            </p>
                                            <span class="text-xs text-gray-500"
                                                >1h</span
                                            >
                                        </div>
                                    </template>
                                    <template v-else>
                                        <div
                                            class="size-9 animate-pulse rounded-full bg-gray-200"
                                        ></div>
                                        <div
                                            class="h-4 w-[40%] animate-pulse bg-gray-200"
                                        ></div>
                                    </template>
                                </div>

                                <!-- comment section -->
                                <div class="space-y-4">
                                    <template v-if="post?.data.comments.length">
                                        <div
                                            class="flex items-center justify-between"
                                            v-for="comment in post?.data
                                                .comments"
                                            :key="comment.id"
                                        >
                                            <div
                                                class="flex items-stretch gap-2"
                                            >
                                                <img
                                                    class="size-9 rounded-full object-cover"
                                                    src="https://placehold.co/40"
                                                    alt=""
                                                />
                                                <div
                                                    class="flex flex-col gap-1"
                                                >
                                                    <p class="">
                                                        <span
                                                            class="font-semibold"
                                                        >
                                                            {{
                                                                comment.user
                                                                    .username
                                                            }}
                                                        </span>
                                                        {{ comment.body }}
                                                    </p>
                                                    <div
                                                        class="flex gap-2 text-xs text-gray-500"
                                                    >
                                                        <p class="">24m</p>
                                                        <a
                                                            class="font-semibold"
                                                            href="#"
                                                        >
                                                            Like
                                                        </a>
                                                        <a
                                                            class="font-semibold"
                                                            href="#"
                                                        >
                                                            Reply
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <Heart class="size-3" />
                                            </div>
                                        </div>
                                    </template>
                                    <p v-else class="text-center text-gray-400">
                                        No comments.
                                    </p>
                                </div>
                            </div>

                            <!-- Post Actions -->
                            <div class="border-b border-gray-200 px-4 py-3">
                                <div class="flex w-full justify-between">
                                    <div
                                        class="flex items-center justify-center gap-4"
                                    >
                                        <button
                                            class="flex items-center"
                                            title="Like"
                                            @click="toggleLike"
                                        >
                                            <Heart
                                                class="size-6"
                                                :class="
                                                    isLiked
                                                        ? 'fill-red-500 text-red-500'
                                                        : ''
                                                "
                                            />
                                        </button>
                                        <MessageCircle class="size-6" />
                                        <Send class="size-6" />
                                    </div>
                                    <div class="ml-auto">
                                        <Bookmark class="size-6" />
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="font-bold">
                                        {{ likesCount }} likes
                                    </p>
                                </div>
                                <div class="mt-1 text-xs text-gray-500">
                                    1 day ago
                                </div>
                            </div>

                            <form class="flex items-center gap-x-1 px-4 py-3">
                                <Smile />
                                <input
                                    v-model="comment"
                                    class="w-full rounded border-none px-3 py-1 text-sm focus:outline-none focus:ring-transparent"
                                    name="comment"
                                    type="text"
                                    placeholder="Add a comment..."
                                    autocomplete="none"
                                />
                                <button
                                    @click.prevent="submitComment"
                                    class="font-semibold text-blue-500 hover:underline disabled:opacity-50 disabled:hover:no-underline"
                                    type="submit"
                                    :disabled="!comment.trim('')"
                                >
                                    Post
                                </button>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</template>
