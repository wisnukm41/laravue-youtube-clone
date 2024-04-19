<template>
    <div class="relative">
        <div 
            class="m-2 bg-black rounded-lg"
            :class="show && width > 639
                ? 'absolute z-30 transition ease-in-out delay-150 hover:translate-y-0 hover:scale-125 hover:bg-[#202020] duration-300' : ''"
        >

            <div @mouseover="show = true" @mouseleave="show = false ; showVideo = false">
                <img 
                    :src="thumbnail || ''" 
                    class="cursor-pointer aspect-video"
                    :class="[
                        show 
                        ? ' transition ease-in-out delay-150 rounded-l-lg' : 'rounded-lg',
                        showVideo ? 'delay-300 hidden' : '']
                    "
                >
                <div class="w-full h-full cursor-pointer aspect-video" :class="    showVideo ? '' : 'delay-300 hidden'">
                    <video ref="video" :src="videoUrl || ''" type="video/mp4" />
                </div>
            </div>

            <div>
                <div class="flex mt-1.5">
                    <div>
                        <img :src="image || ''" class="rounded-full w-8 h-8 m-1.5 mt-2 flex items-baseline">
                    </div>
                    <div class="px-1.5 text-white mt-1">
                        <div class="text-[17px] font-extrabold w-full cursor-pointer">{{ title.substring(0, 100) }}</div>
                        <div class="text-[14px] text-gray-300 font-extrabold flex gap-1 items-center cursor-pointer">{{ user.substring(0, 30) }} <CheckCircle fillColor="#888888" :size="17"/></div>
                        <div class="mb-1 text-sm text-gray-300 cursor-pointer">{{ views }}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script setup>
import { onMounted, ref, toRefs, watch } from 'vue'
import CheckCircle from 'vue-material-design-icons/CheckCircle.vue'

const props = defineProps({
    title : String,
    user: String,
    views: String,
    image: String,
    videoUrl: String,
    thumbnail: String,
})

const {title, user, views, image, videoUrl, thumbnail} = toRefs(props)

let show = ref(false)
let showVideo = ref(false)
let video = ref(null)
let width = ref(document.documentElement.clientWidth)

onMounted(() => {
    window.addEventListener('resize', () => {
        width.value = document.documentElement.clientWidth
    })
})

watch(() => show.value, (show) => {
    if(show){
        showVideo.value = true
        video.value.play()
        return ''
    }

    showVideo.value = false
    video.value.pause()
    video.value.currentTime = 0
})

</script>