<script setup>
import { onUnmounted, reactive, ref } from 'vue';
import {
    ArrowLeft,
    ChevronDown,
    CloudUpload,
    Contact,
    MapPin,
    Smile,
    X,
} from 'lucide-vue-next';

const emit = defineEmits(['close-modal']);

const closeModal = () => {
    emit('close-modal');
};

onUnmounted(() => {
    document.body.style.overflow = '';
});

const createPostStep = ref(1);
const fileInput = ref(null);

const triggerFileInput = () => {
    fileInput.value.click();
};

const newPost = reactive({
    image: null,
});

const handleFileSelect = (e) => {
    const file = e.target.files[0];
    if (file && file.type.match('image.*')) {
        const reader = new FileReader();
        reader.onload = (e) => {
            newPost.image = e.target.result;
            createPostStep.value = 2;
        };
        reader.readAsDataURL(file);
    }
};
</script>

<template>
    <div
        class="fixed inset-0 flex items-center justify-center bg-black/65 p-6"
        @click.self="closeModal"
    >
        <!-- Close Button -->
        <button class="absolute right-4 top-4" @click="closeModal">
            <X class="text-white" :size="25" />
        </button>

        <!-- Create Post Modal -->
        <div
            class="relative mx-auto h-[80%] max-h-[78vh] min-w-full overflow-hidden rounded-lg bg-white shadow-xl md:min-w-[688px] md:max-w-[919px]"
        >
            <div class="flex h-full flex-col">
                <!-- Modal Header -->
                <div
                    class="flex items-center justify-between border-b border-b-gray-300 px-3 py-2.5"
                >
                    <button>
                        <ArrowLeft />
                    </button>
                    <p class="font-extrabold">Create new post</p>
                    <button
                        class="text-sm font-bold text-blue-500"
                        :class="{ 'opacity-50': !newPost.image }"
                        :disabled="!newPost.image"
                    >
                        Share
                    </button>
                </div>

                <!-- Modal Content -->
                <div
                    class="flex flex-1 items-center justify-center overflow-auto"
                >
                    <div
                        v-if="createPostStep === 1"
                        class="flex flex-col items-center justify-center"
                    >
                        <CloudUpload class="text-gray-400" :size="100" />
                        <p class="mt-4 text-xl font-semibold">
                            Drag photos and videos here
                        </p>
                        <button
                            class="mt-6 rounded bg-blue-500 px-4 py-2 text-sm font-bold text-white"
                            @click="triggerFileInput"
                        >
                            Select from computer
                        </button>
                        <input
                            type="file"
                            ref="fileInput"
                            class="hidden"
                            accept="image/*"
                            @change="handleFileSelect"
                        />
                    </div>

                    <div
                        v-if="createPostStep === 2"
                        class="flex h-full w-full flex-col overflow-auto md:flex-row"
                    >
                        <div
                            class="flex h-full w-full items-center justify-center bg-gray-100 md:w-[calc(100%-340px)]"
                        >
                            <img
                                :src="newPost?.image"
                                alt="Preview"
                                class="aspect-[4/5] h-full object-cover"
                            />
                        </div>

                        <!-- Caption Form -->
                        <div
                            class="w-full border-l border-gray-200 md:w-[340px]"
                        >
                            <div class="border-b border-gray-200 px-4 py-4">
                                <div class="mb-4 flex items-center">
                                    <img
                                        src="https://randomuser.me/api/portraits/men/22.jpg"
                                        alt="currentUser.username"
                                        class="mr-2 h-7 w-7 rounded-full object-cover"
                                    />
                                    <span class="text-sm font-extrabold">
                                        m_rizkyprtm
                                    </span>
                                </div>

                                <textarea
                                    v-model="newPost.caption"
                                    placeholder="Write a caption..."
                                    class="mb-4 w-full resize-none border-none bg-transparent px-0 text-sm focus:outline-none"
                                    rows="6"
                                ></textarea>

                                <div
                                    class="flex items-center text-sm text-gray-500"
                                >
                                    <Smile :size="20" class="mr-2" />
                                    <span>Add emoji</span>
                                </div>
                            </div>

                            <div class="space-y-4 p-4 text-gray-500">
                                <div class="flex items-center justify-between">
                                    <span>Add location</span>
                                    <MapPin :size="18" class="text-black" />
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Add collaborators</span>
                                    <Contact :size="18" class="text-black" />
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Accessibility</span>
                                    <ChevronDown :size="18" />
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Advanced settings</span>
                                    <ChevronDown :size="18" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
