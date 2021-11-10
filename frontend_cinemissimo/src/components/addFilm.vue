<template>
    <div class="flex flex-col">
        <div class="flex flex-row">
            <p>Aggiungi un nuovo film</p>
        </div>
        <div class="flex flex-row">
            <p>Aggiungi la locandina</p>
        </div>
        <div class="flex flex-row">
            <div class="flex flex-col">
                <div class="flex flex-row">
                    <input type="text" placeholder="Inserisci il titolo del film" v-model="movie[title]">
                </div>
                <div class="flex flex-row">
                    <input type="text" placeholder="Inserisci la durata del film" v-model="movie[duration]">
                </div>
            </div>
            <div class="flex flex-col">
                <input type="text" placeholder="Inserisci la data di pubblicazione">
            </div>
        </div>
        <div class="flex flex-row">
            <textarea name="Mimmo Frontemare" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="flex flex-row">
            <button>
                Aggiungi film alla lista
            </button>
        </div>
        <p class="text-white">{{ movie }}</p>
    </div>
</template>

<script>
export default {
    name: "addFilm",
    data(){
        return{
            movie: {
                title: "",
                year: null,
                duration: null,
                img: "",
                description:""
            }
        }
    }

}
</script>

<style>

</style>