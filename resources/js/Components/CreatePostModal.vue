<script setup>
import { onUnmounted, ref } from 'vue';
import { router } from '@inertiajs/vue3';
import CreatePostPreview from '@/Components/CreatePostPreview.vue';
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
    clearAll();
};

onUnmounted(() => {
    document.body.style.overflow = '';
});

const createPostStep = ref(1);
const fileInput = ref(null);

const triggerFileInput = () => {
    fileInput.value.click();
};

const files = ref([]);
const previews = ref([]);
const caption = ref('');
const location = ref('');
const isUploading = ref(false);
const error = ref(null);

const handleFileChange = (e) => {
    error.value = null;
    const newFiles = Array.from(e.target.files);

    // Validate files
    if (files.value.length + newFiles.length > 10) {
        error.value = 'You can upload a maximum of 10 files';
        return;
    }

    for (const file of newFiles) {
        if (!file.type.match('image.*|video.*')) {
            error.value = 'Only images and videos are allowed';
            return;
        }

        if (file.size > 20 * 1024 * 1024) {
            // 20MB
            error.value = 'File size must be less than 20MB';
            return;
        }

        // Create preview URL
        const fileWithPreview = {
            file,
            preview: URL.createObjectURL(file),
            type: file.type,
        };

        previews.value.push(fileWithPreview);
    }

    createPostStep.value = 2;

    files.value = [...files.value, ...newFiles];
};

const removeFile = (index) => {
    // Revoke the object URL to prevent memory leaks
    if (previews.value[index]?.preview) {
        URL.revokeObjectURL(previews.value[index].preview);
    }

    // Remove from both arrays
    previews.value.splice(index, 1);
    files.value.splice(index, 1);

    // If all files are removed, go back to step 1
    if (previews.value.length === 0) {
        createPostStep.value = 1;
    }
};

const reorderFiles = ({ from, to }) => {
    const movedItem = previews.value.splice(from, 1)[0];
    previews.value.splice(to, 0, movedItem);
    files.value.splice(to, 0, movedItem);
};

const clearAll = () => {
    // Clean up all object URLs
    previews.value.forEach((file) => {
        if (file?.preview) {
            URL.revokeObjectURL(file.preview);
        }
    });
    previews.value = [];
    files.value = [];
    createPostStep.value = 1;
};

const submitPost = () => {
    isUploading.value = true;

    const formData = new FormData();
    formData.append('caption', caption.value);
    formData.append('location', location.value);

    files.value.forEach((file) => {
        formData.append('media[]', file);
    });

    router.post(route('posts.store'), formData, {
        preserveScroll: true,
        onSuccess: () => {
            clearAll();
            caption.value = '';
            location.value = '';
            isUploading.value = false;
            closeModal();
        },
        onError: (e) => {
            console.log(e);
            isUploading.value = false;
        },
    });
};
</script>

<template>
    <div
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/65 p-6"
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
                        :class="{
                            'opacity-50': isUploading || files.length == 0,
                        }"
                        :disabled="isUploading || files.length == 0"
                        @click="submitPost"
                    >
                        {{ isUploading ? 'Uploading..' : 'Share' }}
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
                            id="post-media"
                            multiple
                            accept="image/*,video/*"
                            @change="handleFileChange"
                        />
                    </div>

                    <div
                        v-if="createPostStep === 2"
                        class="flex h-full w-full flex-col overflow-auto md:flex-row"
                    >
                        <div
                            class="flex h-full w-full items-center justify-center bg-gray-100 md:w-[calc(100%-340px)]"
                        >
                            <CreatePostPreview
                                :files="previews"
                                @remove="removeFile"
                                @reorder="reorderFiles"
                                @clear="clearAll"
                            />
                            <!-- <img
                                :src="newPost?.image"
                                alt="Preview"
                                class="aspect-[4/5] h-full object-cover"
                            /> -->
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
                                    v-model="caption"
                                    placeholder="Write a caption..."
                                    class="mb-4 w-full resize-none border-none bg-transparent px-0 text-sm focus:outline-none focus:ring-0"
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
