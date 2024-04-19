<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue';
import { ref } from 'vue';

defineProps({
    errors: Object,
});

let title = ref('')
let image = ref('')
let video = ref('')
let error = ref({
    title: '',
    image: '',
    video: '',
})

const addVideo = () => {
    let err = false;
    error.value = {
        title: '',
        image: '',
        video: '',
    };

    if(title.value == ''){
        error.value.title = 'Title is required'
        err = true
    }
    if(image.value == ''){
        error.value.image = 'Image is required'
        err = true
    }
    if(video.value == ''){
        error.value.video = 'Video is required'
        err = true
    }

    if(err)
    {
        return
    }

    let data = new FormData()

    data.append('title', title.value)
    data.append('image', image.value)
    data.append('video', video.value)

    router.post('/video', data)
}

const getImage = (e) => image.value = e.target.files[0]
const getVideo = (e) => video.value = e.target.files[0]

</script>

<template>
    <Head title="Youtube" />
    <NavLayout >
        <div class="max-w-xl px-4 mx-auto">
          <div class="py-10 text-3xl font-extrabold text-white">Add Video</div>
          <form @submit.prevent="addVideo">
            <div>
                <div class="text-gray-200">Title</div>
                <input
                    v-model="title"
                    type="text"
                    class="form-control block w-full px-5 py-1.5 text-xl font-normal text-gray-200 bg-black placeholder-gray-400 bg-clip-padding border border-solid border-l-gray-600 rounded transition ease-in-out m-0 border-transparent focus:ring-0"
                    placeholder="Cool Video"
                >
                <span v-if="error.title" class="text-red-500">{{ error.title }}</span>
            </div>
            <div class="my-5"></div>
            <div>
                <div class="text-gray-200">Thumbnail</div>
                <input
                    @change="getImage"
                    type="file"
                    class="form-control block w-full px-3 py-1.5 border text-white border-solid border-gray-600 rounded transition ease-in-out m-0 focus:text-gray-700 focus:border-blue-600 focus:outlinr-none"
                    placeholder="Cool Video"
                >
                <span v-if="error.image" class="text-red-500">{{ error.image }}</span>
                <span v-if="errors.image" class="text-red-500">{{ errors.image }}</span>
            </div>
            <div class="my-5"></div>
            <div>
                <div class="text-gray-200">Video</div>
                <input
                    @change="getVideo"
                    type="file"
                    class="form-control block w-full px-3 py-1.5 border text-white border-solid border-gray-600 rounded transition ease-in-out m-0 focus:text-gray-700 focus:border-blue-600 focus:outlinr-none"
                    placeholder="Cool Video"
                >
                <span v-if="error.video" class="text-red-500">{{ error.video }}</span>
                <span v-if="errors.video" class="text-red-500">{{ errors.video }}</span>
            </div>

            <div class="my-5"></div>
            <div class="float-right">
                <button
                    type="submit"
                    class="px-4 py-2 font-bold text-white bg-green-600 rounded cursor-pointer trext-white hover:bg-green-700"
                >
                    Upload Video
                </button>
            </div>
          </form>
        </div>
    </NavLayout>
</template>