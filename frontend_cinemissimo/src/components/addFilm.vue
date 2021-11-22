<template>
    <div class="flex flex-row h-full w-full justify-center pt-10">
        <div class="flex flex-col h-full w-1/4 justify-center ">
            <label for="title" class="text-white mb-2">Titolo</label>
            <input class="rounded px-3 w-full py-1 outline-none" type="text" id="title" placeholder="title" v-model="movie.title">
            <label for="title" class="text-white mb-2 mt-3">Durata</label>
            <input class="rounded px-3 w-full py-1 outline-none" type="text" id="Durata" placeholder="Durata" v-model="movie.duration">
            <label for="title" class="text-white mb-2 mt-3">Anno</label>
            <input class="rounded px-3 w-full py-1 outline-none" type="text" id="Anno" placeholder="Anno" v-model="movie.year">
            <label for="title" class="text-white  mb-2 mt-3 outline-none">Descrizione</label>
            <textarea class="rounded px-3 w-full pt-1 py-1 outline-none" name="descrizione" id="descrizione" cols="30" rows="10" placeholder="Descrizione" v-model="movie.description"></textarea>
            <label for="title" class="text-white  mb-2 mt-3">image</label>
            <input class="rounded px-3 w-full py-1 outline-none" type="text" id="image" placeholder="image" v-model="movie.img">

            <div class="w-full flex flex-row justify-end mt-7">
                <button class="text-blu-dark bg-giallo rounded-lg py-1 px-4" @click="addFilm()">
                    Aggiungi film
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
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
            // creare una funzione per fare una chiamata post per creare il film
        }
    },

    methods: {
        async addFilm() {
            await axios.post("http://localhost:8000/api/movies/create", this.movie)   
            this.$route.push("/home")
        }
    }

}
</script>