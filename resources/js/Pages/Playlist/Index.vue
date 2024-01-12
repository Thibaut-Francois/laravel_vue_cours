<template>

    <MusicLayout>
        <template #title>
            Playlists
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
            <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Nombre de musiques</th>
                    <th>Créée le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr
                v-for="playlist in playlists"
                :key="playlist.uuid"
                >
                    <td>{{ i+1 }}</td>
                    <td>{{ playlist.title }}</td>
                    <td>{{ playlist.tracks_count }}</td>
                    <td>{{ $moment(playlist.created_at).format('DD/MM/YYYY hh:mm:ss') }}</td>
                    <td>
                        
                    </td>
                </tr>
            </tbody>
        </table>
        {{ playlists }}
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'

export default{
    components:{
        MusicLayout,
    },
    props:{
        playlists:Array,
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