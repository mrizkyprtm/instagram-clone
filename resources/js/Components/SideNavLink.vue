<script setup>
import { Link } from '@inertiajs/vue3';
import * as icons from 'lucide-vue-next';
import { computed } from 'vue';
const props = defineProps({
    href: {
        type: String,
        default: '#',
    },
    icon: String,
    isProfile: Boolean,
});

const icon = computed(() => icons[props.icon]);
</script>

<template>
    <Link
        class="flex items-center gap-4 rounded-lg p-1 transition-all hover:bg-gray-200 md:p-3"
        :href="props.href"
    >
        <template v-if="props.isProfile">
            <img
                class="size-6 rounded-full object-cover"
                src="https://randomuser.me/api/portraits/men/22.jpg"
                alt=""
            />
        </template>
        <template v-else>
            <component
                :is="icon"
                class="block size-6"
                :class="{ 'stroke-[3]': $page.url === props.href }"
            />
        </template>
        <span
            class="hidden xl:block"
            :class="{ 'font-bold': $page.url === props.href }"
        >
            <slot />
        </span>
    </Link>
</template>
