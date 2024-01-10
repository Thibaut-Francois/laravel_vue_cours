<template>
    <div
    class="m-4 shadow-lg leStyle"
    :class="{'border border-black': active}"
    >
        <div class="">
            <img :src="'/storage/' + track.image" alt="" class="w-1/3 h-1/3 mx-auto ">

            <h4 class="font-bold text-xl mb-2 text-center">
                {{track.title}}
            </h4>
            <p class="text-center">
                {{track.artist}}
            </p>

            <div class="w-full flex">
                <button
                class="bg-blue-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded w-3/5 mb-2 mx-auto"
                @click="handleClick"
                >
                    Lire
            </button>
            </div>
            
            <div class="w-full flex justify-content-between justify-around">
                <Link
                v-if="$page.props.isAdmin"
                :href="route('tracks.edit', {track: track})"
                class="bg-green-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded w-2/5 text-center"
                >
                    Modifier
                </Link>

                <Link
                v-if="$page.props.isAdmin"
                    :href="route('tracks.destroy', {track: track})"
                    method="delete"
                    as="button"
                    class="bg-red-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded w-2/5 text-center"
                >
                    Supprimer
                </Link>
            </div>
            
        </div>
    </div>
</template>

<script>
export default{
    emits: ['played'],
    props: {
        track: Object,
        active:{
            type: Boolean,
            default: false,
        } 
    },
    methods: {
        handleClick(){
            this.$emit('played', this.track);
        }
    }
}
</script>