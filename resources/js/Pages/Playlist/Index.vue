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
                Créer une Musique
            </Link>
        </template>

        <template #content>

        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'

export default{
    components:{
        MusicLayout,
    }
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