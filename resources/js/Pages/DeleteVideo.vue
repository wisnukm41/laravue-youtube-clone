<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue';

defineProps({
    videos : Array
});

</script>

<template>
    <Head title="Youtube" />
    <NavLayout >
        <div class="max-w-2xl p-4 mx-auto">
            <table class="min-w-full">
                <thead class="border-b">
                    <tr class="flex justify-between text-white">
                        <th class="px-6 py-4 text-sm font-medium text-left">Videos</th>
                        <th class="px-6 py-4 text-sm font-medium text-left">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <div v-for="video in videos" :key="video.id">
                        <tr class="flex justify-between border-b">
                            <td class="w-7/12 px-6 py-4 text-sm font-medium text-gray-900">
                                <video width="320" :src="video.video" controls></video>
                            </td>
                            <td class="relative w-5/12 px-6 py-4 text-sm font-medium text-gray-900">
                                <div class="mb-4 font-extrabold text-white">{{ video.title }}</div>
                                <div class="w-full">
                                    <Link
                                        as="button"
                                        method="delete"
                                        :href="route('video.destroy', {id: video.id})"
                                        class="absolute float-right px-1 py-1 text-xs font-bold text-white bg-red-600 rounded cursor-pointer bottom-4 right-4 hover:bg-red-700"
                                    >Delete</Link>
                                </div>
                            </td>
                        </tr>
                    </div>
                </tbody>
            </table>
        </div>
    </NavLayout>
</template>