<template>
    <MusicLayout>
        <template #title>
            Playlist: {{ playlist.title }}
            <Link 
            :href="route('playlists.index')" class="bg-blue-500 text-white font-bold py-2 px-4">
                Retour
            </Link>
        </template>
        <template #content>
            
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'

export default {
    components: {
        MusicLayout,
    },
    props: {
        playlist: Object,
    },
}
</script>