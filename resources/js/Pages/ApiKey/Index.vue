<template>

    <MusicLayout>
        <template #title>
            Vos Clefs
        </template>

        <template #action>
            <Link
            :href="route('apiKeys.create')"
            v-if="$page.props.isAdmin"
            >
                Créer une Clef
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
    },
    props:{
        playlists:Array,
    },
}
</script>