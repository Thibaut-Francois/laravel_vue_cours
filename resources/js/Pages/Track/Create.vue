<template>

    <MusicLayout>
        <template #title>
            Créer une musique
        </template>

        <template #action>
            <Link
            :href="route('tracks.index')">
                Retour
            </Link>
        </template>

        <template #content>
            <!-- <input type="text" v-model="test">
            Ma variable {{ test }} -->

            <form @submit.prevent="submit">

                 <!-- ---------------- Titre -->
                <div class="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Titre
                </label>
                <input
                    id="title"
                    v-model="form.title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    :class="{'border-red-500': form.errors.title}"
                    type="text"
                    placeholder="Title"
                >
                <p class="text-red-500 text-xs italic">{{ form.errors.title }}</p>
                </div>

                 <!-- ---------------- artist -->
                <div class="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="artist">
                    Artist
                </label>
                <input
                    id="artist"
                    v-model="form.artist"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    :class="{'border-red-500': form.errors.artist}"
                    type="text"
                    placeholder="Artist"
                >
                <p class="text-red-500 text-xs italic">{{ form.errors.artist }}</p>
                </div>

                 <!-- ---------------- image -->
                <div class="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Image
                </label>
                <input
                    id="image"
                    @input="form.image =$event.target.files[0]"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    :class="{'border-red-500': form.errors.image}"
                    type="file"
                    placeholder="Image"
                >
                <p class="text-red-500 text-xs italic">{{ form.errors.image }}</p>
                </div>

                 <!-- ---------------- music -->
                <div class="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="music">
                    Musique
                </label>
                <input
                    id="music"
                    @input="form.music =$event.target.files[0]"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    :class="{'border-red-500': form.errors.music}"
                    type="file"
                    placeholder="Musique"
                >
                <p class="text-red-500 text-xs italic">{{ form.errors.music }}</p>
                </div>

                <!-- ---------------- display -->
                <div class="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="display">
                    Display
                </label>
                <select
                    id="display"
                    v-model="form.display"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    :class="{'border-red-500': form.errors.display}"
                    placeholder="Display">
                    <option :value="true">Oui</option>
                    <option :value="false">Non</option>
                </select>

                <p class="text-red-500 text-xs italic">{{ form.errors.display }}</p>
                </div>

                <input type="submit" value="créer la musique" class="bg-blue-500 text-white font-bold py-2 px-4">

                {{ form }}
            </form>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'
import {Link} from '@inertiajs/vue3'

export default{
    components: {
        MusicLayout,
        Link,
    },
    data(){
        return{
            // test: '',
            form: this.$inertia.form({
                title:'',
                artist: '',
                image: null,
                music: null,
                display: true,
            }),
        }
    },
    methods:{
        submit(){
            this.form.post(route('tracks.store'));
        }
    }
}
</script>



<style scoped>
    ul{
        list-style: none;
        padding: 0;
    }
    li{
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ccc;
        padding: 10px;
    }
    li:hover{
        background: #8cc0eb;
        color: white;
        cursor: pointer;
    }
    h3{
        margin: 0;
    }
    p{
        margin: 0;
    }
</style>