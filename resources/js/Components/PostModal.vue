<script setup>
import { onMounted, onUnmounted } from 'vue';
import {
    Bookmark,
    Heart,
    MessageCircle,
    MoreHorizontal,
    Send,
    Smile,
    X,
} from 'lucide-vue-next';

onMounted(() => {
    document.body.style.overflow = 'hidden';
});

onUnmounted(() => {
    document.body.style.overflow = '';
});

const emit = defineEmits(['closePostModal']);

const closePostModal = () => {
    emit('closePostModal');
};
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
                class="h-[calc(100dvh-100px)] max-w-6xl overflow-y-scroll rounded bg-white md:h-[calc(100dvh-48px)] md:overflow-hidden"
            >
                <div class="flex h-full flex-col overflow-y-auto md:flex-row">
                    <div
                        class="h-full w-full overflow-hidden md:w-[60%]"
                        id="image"
                    >
                        <img
                            src="/storage/posts/0KqHQ2EADm9XjrRxmUpfrdqpqaohuKz4XXfIMSbL.jpg"
                            alt=""
                            class="h-full w-full object-cover"
                        />
                    </div>

                    <aside class="h-full w-full md:w-[40%]">
                        <div class="flex h-full flex-col">
                            <!-- User Info -->
                            <div
                                class="flex items-center justify-between border-b border-gray-200 px-4 py-3"
                            >
                                <div class="flex items-center gap-2">
                                    <img
                                        class="size-9 rounded-full object-cover"
                                        src="https://placehold.co/40"
                                        alt=""
                                    />
                                    <h1 class="font-semibold">username</h1>
                                </div>
                                <button class="" title="More options">
                                    <MoreHorizontal class="size-5" />
                                </button>
                            </div>

                            <div
                                class="flex flex-1 flex-col gap-y-4 overflow-y-auto border-b border-gray-200 px-4 py-6"
                            >
                                <!-- caption -->
                                <div class="flex items-start gap-2">
                                    <img
                                        class="size-9 rounded-full object-cover"
                                        src="https://placehold.co/40"
                                        alt=""
                                    />
                                    <div class="flex flex-col gap-1">
                                        <p class="">
                                            <span class="font-semibold"
                                                >username</span
                                            >
                                            Lorem ipsum dolor sit amet,
                                            consectetur adipisicing elit. Ipsa
                                            fugiat dignissimos obcaecati
                                            excepturi distinctio a soluta dicta
                                            officia, voluptas itaque libero ad
                                            sapiente suscipit dolorem, unde
                                            molestias repellat. Odit, itaque
                                            consectetur sit, blanditiis cumque
                                            aspernatur aliquam neque nulla
                                            quidem, tempora laboriosam
                                            exercitationem! Aperiam, optio vero.
                                            Esse omnis magni modi molestias
                                            ratione fugit pariatur eaque cumque
                                            assumenda voluptate ullam totam
                                            doloremque ea perspiciatis maiores
                                            nam animi sit quia voluptas,
                                            voluptatibus error possimus ipsum
                                            provident eligendi. In excepturi
                                            dolore doloremque perspiciatis
                                            deleniti architecto tempore
                                            molestias explicabo beatae nemo
                                            voluptate non quam sint, expedita
                                            fuga ratione similique fugiat
                                        </p>
                                        <span class="text-xs text-gray-500"
                                            >1h</span
                                        >
                                    </div>
                                </div>

                                <!-- comment section -->
                                <div class="space-y-4">
                                    <template v-for="a in 10" :key="a">
                                        <div
                                            class="flex items-center justify-between"
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
                                                            lorem_ipsum
                                                        </span>
                                                        nice lorem!
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
                                    <!-- <p class="text-center text-gray-400">
                                        No comments.
                                    </p> -->
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
                                        >
                                            <Heart class="size-6" />
                                        </button>
                                        <MessageCircle class="size-6" />
                                        <Send class="size-6" />
                                    </div>
                                    <div class="ml-auto">
                                        <Bookmark class="size-6" />
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="font-bold">46 likes</p>
                                </div>
                                <div class="mt-1 text-xs text-gray-500">
                                    1 day ago
                                </div>
                            </div>

                            <form class="flex items-center gap-x-1 px-4 py-3">
                                <Smile />
                                <input
                                    class="w-full rounded border-none px-3 py-1 text-sm focus:outline-none focus:ring-transparent"
                                    name="comment"
                                    type="text"
                                    placeholder="Add a comment..."
                                    autocomplete="none"
                                />
                                <button
                                    class="font-semibold text-blue-500 hover:underline disabled:opacity-50 disabled:hover:no-underline"
                                    type="submit"
                                    :disabled="true"
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
