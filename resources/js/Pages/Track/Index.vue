<template>

    <MusicLayout>
        <template #title>
            Musique
        </template>

        <template #action>
            <Link
            :href="route('tracks.create')"
            v-if="$page.props.isAdmin"
            >
                Créer une Musique
            </Link>
        </template>

        <template #content>
            <div>
                <div>
                    <input 
                    id="search" 
                    name="search" 
                    type="search"
                    v-model="search"
                    >
                    <!-- Search : {{ search }} -->
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <Track
                    v-for="track in filteredTracks"
                    :key="track.uuid"
                    :track="track"
                    :active="currentTrack === track.uuid"
                    @played="play"
                    />
                </div>
            </div>
        </template>
    </MusicLayout>
</template>

<script>
import Track from '@/Components/Track/Track.vue'
import MusicLayout from '@/Layouts/MusicLayout.vue'
import {Link} from '@inertiajs/vue3'

export default{
    components: {
        MusicLayout,
        Link,
        Track,
    },
    props: {
        tracks: Array,
    },
    data(){
        return{
            search:'',
            audio:'',
            currentTrack: null,
        }
    },
    computed:{
        filteredTracks(){
            return this.tracks.filter(track => track.title.toLowerCase().includes(this.search.toLowerCase()) || track.artist.toLowerCase().includes(this.search.toLowerCase()));
        }
    },
    methods: {
        play(track) {
            const url = '/storage/' + track.music;

            if(!this.currentTrack) {
                this.audio = new Audio(url);
                this.audio.play();
            } else if (this.currentTrack !== track.uuid) {
                this.audio.pause();
                this.audio.src = url;
                this.audio.play();
            } else if (!this.audio.paused) {
                this.audio.pause();
            } else {
                this.audio.play();
            }

            this.currentTrack = track.uuid;
            this.audio.addEventListener('ended', () => this.currentTrack = null);
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