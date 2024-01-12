<template>

    <MusicLayout>
        <template #title>
            Créer une Playlists
        </template>

        <template #action>
            <Link
            :href="route('playlists.create')"
            v-if="$page.props.isAdmin"
            >
                Créer une Playlist
            </Link>
        </template>

        <template #content>
            <form
            @submit.prevent="submit"
            >
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

                <!-- ---------------- Tracks -->
                <div
                v-for="track in tracks"
                :key="track.uuid"
                >
                    <input
                    type="checkbox"
                    name="tracks"
                    :id="track.uuid"
                    :value="track.uuid"
                    v-model="form.tracks"
                    >
                    <label
                    :for="track.uuid">
                        {{ track.title }}
                    </label>
                </div>
                <p class="text-red-500 text-xs italic">{{ form.errors.tracks }}</p>

                <input type="submit" value="créer la playlist" class="bg-blue-500 text-white font-bold py-2 px-4">
            </form>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'

export default{
    components:{
        MusicLayout,
    },
    data(){
        return{
            form: this.$inertia.form({
            title:'',
            tracks:[],
        })
        }
    },
    props:{
        tracks:Array,
    },
    methods: {
        submit(){
            this.form.post(route('playlists.store'))
        }
    },
}
</script>



<style scoped>
    ul{
        list-style: none;
        padding: 0;
    }
    .leStyle{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }
    .leStyle:hover{
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