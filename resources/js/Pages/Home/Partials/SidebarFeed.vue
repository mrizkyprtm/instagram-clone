<script setup>
import { useForm, usePage } from '@inertiajs/vue3';

const page = usePage();
const currentUser = page.props.auth.user;

const form = useForm();

const logout = () => {
    if (confirm('Are you sure want to logout?')) {
        form.post(route('logout'));
    }
};
</script>

<template>
    <div
        class="mt-9 flex flex-col items-stretch justify-start overflow-visible"
    >
        <!-- Profile -->
        <div class="flex w-full flex-col px-4">
            <div class="mb-6 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <img
                        src="https://randomuser.me/api/portraits/men/22.jpg"
                        alt=""
                        class="h-11 w-11 rounded-full object-cover"
                    />
                    <div>
                        <div class="text-sm font-extrabold">
                            {{ currentUser?.username }}
                        </div>
                        <div class="text-sm text-gray-400">
                            <p class="line-clamp-1">{{ currentUser?.name }}</p>
                        </div>
                    </div>
                </div>
                <button
                    class="text-xs font-extrabold text-blue-500"
                    @click="logout"
                >
                    Switch
                </button>
            </div>
        </div>

        <!-- Suggested user -->
        <div class="mb-2 flex flex-col px-4">
            <div class="mb-4">
                <div class="mb-4 flex items-center justify-between">
                    <span class="text-sm font-extrabold text-gray-500"
                        >Suggested For You</span
                    >
                    <button class="text-xs font-extrabold">See All</button>
                </div>

                <div
                    v-for="suggestion in 5"
                    :key="suggestion"
                    class="mb-4 flex items-center justify-between"
                >
                    <div class="flex items-center space-x-3">
                        <img
                            src="https://randomuser.me/api/portraits/men/22.jpg"
                            alt=""
                            class="h-11 w-11 rounded-full object-cover"
                        />
                        <div>
                            <div class="text-sm font-extrabold">user_name</div>
                            <div class="text-xs text-gray-400">Followed by</div>
                        </div>
                    </div>
                    <button class="text-xs font-extrabold text-blue-500">
                        Follow
                    </button>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mb-2 flex flex-col px-4">
            <div class="text-xs text-gray-300">
                <div class="mb-5 flex flex-wrap gap-1">
                    <a href="#" class="mr-1 hover:underline">About</a>
                    <a href="#" class="mr-1 hover:underline">Help</a>
                    <a href="#" class="mr-1 hover:underline">Press</a>
                    <a href="#" class="mr-1 hover:underline">API</a>
                    <a href="#" class="mr-1 hover:underline">Jobs</a>
                    <a href="#" class="mr-1 hover:underline">Privacy</a>
                    <a href="#" class="mr-1 hover:underline">Terms</a>
                    <a href="#" class="mr-1 hover:underline">Locations</a>
                    <a href="#" class="mr-1 hover:underline">Languange</a>
                    <a href="#" class="mr-1 hover:underline">Meta Verified</a>
                </div>
                <div>© 2025 INSTAGRAM CLONE BY MoRP.</div>
            </div>
        </div>
    </div>
</template>
