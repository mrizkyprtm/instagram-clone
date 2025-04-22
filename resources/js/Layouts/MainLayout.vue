<script setup>
import CreatePostModal from '@/Components/CreatePostModal.vue';
import SideNav from '@/Components/SideNav.vue';
import { provide, ref } from 'vue';

const isModalOpen = ref(false);
const postModalIsOpen = ref(false);

// Create Post Modal
const openModal = () => {
    isModalOpen.value = true;
    document.body.style.overflow = 'hidden';
};

const closeModal = () => {
    isModalOpen.value = false;
};

// Show Post Modal
const openPostModal = () => {
    postModalIsOpen.value = true;
};

provide('modal', {
    openModal,
    openPostModal,
});
</script>

<template>
    <div
        id="MainLayout"
        class="relative flex h-screen w-full flex-col md:flex-row"
    >
        <!-- Side navigation -->
        <SideNav />

        <!-- Main content -->
        <div
            class="ml-auto h-full w-full md:w-[calc(100%-4.5rem)] xl:w-[calc(100%-244px)]"
        >
            <slot />
        </div>
    </div>

    <transition-group name="fade">
        <CreatePostModal v-if="isModalOpen" @close-modal="closeModal" />
    </transition-group>
</template>

<style>
::-webkit-scrollbar {
    width: 16px;
    height: 5px;
}

::-webkit-scrollbar-track {
    background: white;
    border-radius: 100vh;
}
::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
    border: 4px solid white;
}
::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
