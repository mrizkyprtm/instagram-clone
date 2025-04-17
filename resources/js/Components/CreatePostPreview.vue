<script setup>
import { ref, computed } from 'vue';
import { X, ChevronLeft, ChevronRight, Play } from 'lucide-vue-next';

const props = defineProps({
    files: {
        type: Array,
        required: true,
    },
});

const emit = defineEmits(['remove', 'reorder', 'clear']);

const activeIndex = ref(0);
const isDragging = ref(false);
const dragIndex = ref(null);

const activeFile = computed(() => {
    return props.files[activeIndex.value];
});

const nextSlide = () => {
    activeIndex.value = (activeIndex.value + 1) % props.files.length;
};

const prevSlide = () => {
    activeIndex.value =
        (activeIndex.value - 1 + props.files.length) % props.files.length;
};

const removeFile = (index) => {
    emit('remove', index);
    if (activeIndex.value >= index && activeIndex.value > 0) {
        activeIndex.value--;
    }
};

// const clearAll = () => {
//     emit('clear');
// };

// Drag and drop reordering
const startDrag = (index) => {
    isDragging.value = true;
    dragIndex.value = index;
};

const onDrop = (index) => {
    if (
        isDragging.value &&
        dragIndex.value !== null &&
        dragIndex.value !== index
    ) {
        emit('reorder', { from: dragIndex.value, to: index });
    }
    isDragging.value = false;
    dragIndex.value = null;
};
</script>

<template>
    <div class="relative h-full overflow-hidden rounded-lg bg-black">
        <!-- Close button -->
        <button
            @click="removeFile"
            class="absolute right-2 top-2 z-10 rounded-full bg-gray-800 bg-opacity-70 p-2 text-white"
        >
            <X class="h-4 w-4" />
        </button>

        <!-- Main preview area -->
        <div class="relative flex h-96 items-center justify-center">
            <!-- Media display -->
            <template v-if="files.length > 0">
                <div
                    class="relative flex h-full w-full items-center justify-center"
                >
                    <!-- Image preview -->
                    <img
                        v-if="activeFile.type.startsWith('image')"
                        :src="activeFile.preview"
                        class="max-h-full max-w-full object-contain"
                        alt="Preview"
                    />

                    <!-- Video preview -->
                    <video
                        v-else
                        :src="activeFile.preview"
                        class="max-h-full max-w-full object-contain"
                        controls
                    />
                </div>

                <!-- Navigation arrows (only show if multiple files) -->
                <template v-if="files.length > 1">
                    <button
                        @click="prevSlide"
                        class="absolute left-2 top-1/2 z-10 -translate-y-1/2 rounded-full bg-gray-800 bg-opacity-70 p-2 text-white"
                    >
                        <ChevronLeft class="h-5 w-5" />
                    </button>
                    <button
                        @click="nextSlide"
                        class="absolute right-2 top-1/2 z-10 -translate-y-1/2 rounded-full bg-gray-800 bg-opacity-70 p-2 text-white"
                    >
                        <ChevronRight class="h-5 w-5" />
                    </button>
                </template>
            </template>

            <!-- Empty state -->
            <div v-else class="p-4 text-center text-gray-500">
                <p>No media selected</p>
            </div>
        </div>

        <!-- Thumbnail strip -->
        <div
            v-if="files.length > 1"
            class="absolute bottom-2 left-0 right-0 z-10 flex justify-center space-x-2"
        >
            <div
                v-for="(file, index) in files"
                :key="index"
                @click="activeIndex = index"
                @dragstart="startDrag(index)"
                @dragover.prevent
                @drop="onDrop(index)"
                draggable="true"
                class="h-12 w-12 cursor-pointer overflow-hidden rounded border-2"
                :class="{
                    'border-blue-500': activeIndex === index,
                    'border-transparent': activeIndex !== index,
                    'opacity-50': isDragging && dragIndex === index,
                }"
            >
                <img
                    v-if="file.type.startsWith('image')"
                    :src="file.preview"
                    class="h-full w-full object-cover"
                    alt="Thumbnail"
                />
                <div
                    v-else
                    class="flex h-full w-full items-center justify-center bg-gray-800 text-white"
                >
                    <Play class="h-4 w-4" />
                </div>
            </div>
        </div>
    </div>
</template>
