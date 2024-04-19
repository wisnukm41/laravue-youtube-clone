<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue';
import CheckCircle from 'vue-material-design-icons/CheckCircle.vue'
import ThumbUpOutline from 'vue-material-design-icons/ThumbUpOutline.vue'
import ThumbDownOutline from 'vue-material-design-icons/ThumbDownOutline.vue'
import RecommendedVideos from '../Components/RecommendedVideos.vue';

defineProps({
    video: Object,
    comments: Array,
    recommendedVideos: Array
});

</script>

<template>
    <Head title="Youtube" />
    <NavLayout >
        <div class="xl:flex">
            <div class="p-3">
                <video :src="video.video" controls autoplay class="w-full"></video>
                <div class="mt-4 text-2xl font-extrabold text-white">{{ video.title }}</div>
                <div class="flex items-center mb-4">
                    <img 
                        :src="`https://picsum.photos/id/${(Math.random() * 100).toFixed(0)}/100`" 
                        class="rounded-full w-8 h-8 m-1.5 mt-2 flex items-baseline">
                    <div class="pl-1.5  mt-1">
                        <div class="flex items-center text-lg font-extrabold text-white">{{ video.user }} <CheckCircle fillColor="#888888" :size="17"/></div>
                        <div class="text-sm font-extrabold text-gray-400">{{ video.views }}</div>
                    </div>
                </div>

                <div class="bg-[#3f3f3f] rounded-lg w-full p-3 text-white">
                    <div class="text-lg font-extrabold text-white">Description</div>
                    <div class="mt-1 mb-6 text-sm font-extrabold">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi ipsam itaque excepturi, esse beatae vitae obcaecati voluptatibus vero aliquam provident quaerat labore quam est fuga, corrupti eligendi. Aperiam, assumenda optio.
                    </div>
                </div>

                <div class="w-[500px] p-3 sm:hidden block">
                    <div v-for="vid in recommendedVideos" :key="vid.id">
                        <Link class="flex mb-3" :href="route('video.show', {id:vid.id})">
                            <RecommendedVideos
                                :vid="vid"
                            />
                        </Link>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="text-lg font-extrabold text-white">{{ comments.length }} Comments</div>
                    <div v-for="comment in comments" :key="comment.id">
                        <div class="flex mt-2 mb-4">
                            <img
                            :src="`https://picsum.photos/id/${(Math.random() * 100).toFixed(0)}/100`"
                            class="w-12 h-12 mt-2 rounded-full">
                            <div class="pl-6 mt-1">
                                <div class="font-extrabold text-white">
                                    <div>{{ comment.user }}</div>
                                    <div class="pl-3 text-gray-400">{{ comment.time }}</div>
                                </div>
                                <div class="text-sm font-semibold text-gray-200">
                                    {{ comment.text }}
                                </div>
                                <div class="flex items-center mt-4">
                                    <ThumbUpOutline :size="20" class="pr-2" fillColor="#ffffff"/>
                                    <div class="pr-10 text-sm font-extrabold text-gray-400">
                                        {{ (Math.random() * 100).toFixed(0) }}
                                    </div>
                                    <ThumbDownOutline :size="20" class="pr-2" fillColor="#ffffff"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-[500px] p-3 sm:block hidden">
                <div v-for="vid in recommendedVideos" :key="vid.id">
                    <Link class="flex mb-3" :href="route('video.show', {id:vid.id})">
                        <RecommendedVideos
                            :vid="vid"
                        />
                    </Link>
                </div>
            </div>
        </div>
    </NavLayout>
</template>