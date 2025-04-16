<script setup>
import { ref } from 'vue';
import { Carousel, Navigation, Slide } from 'vue3-carousel';
import 'vue3-carousel/carousel.css';

const stories = ref([
    {
        id: 1,
        user: {
            id: 'user-1',
            username: 'nature_lover',
            name: 'Nature Lover',
            avatar: 'https://randomuser.me/api/portraits/women/33.jpg',
        },
        viewed: true,
    },
    {
        id: 2,
        user: {
            id: 'user-2',
            username: 'travel_addict',
            name: 'Travel Addict',
            avatar: 'https://randomuser.me/api/portraits/men/22.jpg',
        },
        viewed: false,
    },
    {
        id: 3,
        user: {
            id: 'user-3',
            username: 'foodie_paradise',
            name: 'Foodie Paradise',
            avatar: 'https://randomuser.me/api/portraits/women/12.jpg',
        },
        viewed: false,
    },
    {
        id: 4,
        user: {
            id: 'user-4',
            username: 'fitness_guru',
            name: 'Fitness Guru',
            avatar: 'https://randomuser.me/api/portraits/men/45.jpg',
        },
        viewed: false,
    },
    {
        id: 5,
        user: {
            id: 'user-5',
            username: 'tech_geek',
            name: 'Tech Geek',
            avatar: 'https://randomuser.me/api/portraits/men/67.jpg',
        },
        viewed: false,
    },
    {
        id: 6,
        user: {
            id: 'user-6',
            username: 'art_enthusiast',
            name: 'Art Enthusiast',
            avatar: 'https://randomuser.me/api/portraits/women/78.jpg',
        },
        viewed: false,
    },
    {
        id: 7,
        user: {
            id: 'user-7',
            username: 'music_producer',
            name: 'Music Producer',
            avatar: 'https://randomuser.me/api/portraits/men/89.jpg',
        },
        viewed: false,
    },
    {
        id: 8,
        user: {
            id: 'user-7',
            username: 'music_producer',
            name: 'Music Producer',
            avatar: 'https://randomuser.me/api/portraits/men/90.jpg',
        },
        viewed: false,
    },
    {
        id: 9,
        user: {
            id: 'user-7',
            username: 'music_producer',
            name: 'Music Producer',
            avatar: 'https://randomuser.me/api/portraits/women/69.jpg',
        },
        viewed: false,
    },
    {
        id: 10,
        user: {
            id: 'user-7',
            username: 'music_producer',
            name: 'Music Producer',
            avatar: 'https://randomuser.me/api/portraits/men/52.jpg',
        },
        viewed: false,
    },
]);

const carouselConfig = {
    itemsToShow: 5.5,
    itemsToScroll: 4,
    snapAlign: 'start',
    transition: 500,
    gap: 10,
    // wrapAround: false,
    preventExcessiveDragging: true,
    clamp: true,
    breakpointMode: 'viewport',
    breakpoints: {
        650: {
            itemsToShow: 6.5,
            snapAlign: 'start',
        },
        1024: {
            itemsToShow: 8,
            snapAlign: 'start',
        },
    },
};
</script>

<template>
    <div class="mb-6 flex h-24 flex-col">
        <div
            class="custom-scrollbar flex-1 overflow-x-auto overflow-y-hidden rounded-md py-1"
        >
            <Carousel v-bind="carouselConfig">
                <Slide
                    v-for="story in stories"
                    :key="story.id"
                    class="flex flex-shrink-0 flex-col items-center justify-center space-y-1"
                >
                    <div
                        class="rounded-full bg-gray-300 p-0.5"
                        :class="{ 'story-gradient': !story.viewed }"
                    >
                        <div class="rounded-full bg-white p-0.5">
                            <img
                                :src="story.user.avatar"
                                :alt="story.user.username"
                                class="h-14 w-14 rounded-full object-cover"
                            />
                        </div>
                    </div>
                    <span class="max-w-full truncate text-xs">
                        {{ story.user.username }}
                    </span>
                </Slide>

                <template #addons>
                    <Navigation />
                </template>
            </Carousel>
        </div>
    </div>
</template>

<style>
.story-gradient {
    background: linear-gradient(
        45deg,
        #f09433,
        #e6683c,
        #dc2743,
        #cc2366,
        #bc1888
    );
}

.carousel__next,
.carousel__prev {
    background: wheat;
    border-radius: 50%;
    top: 35px;
}

.carousel__next--disabled,
.carousel__prev--disabled {
    opacity: 0;
}
</style>
