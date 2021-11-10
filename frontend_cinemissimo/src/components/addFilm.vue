<template>
    <div class="flex flex-row h-full w-full">
        <div class="flex flex-col w-full h-full items-center justify-center">
            <label for="title" class="text-white">Titolo</label>
            <input class="rounded px-3 w-64" type="text" id="title" placeholder="title" v-model="movie.title">
            <label for="title" class="text-white">Durata</label>
            <input class="rounded px-3 w-64" type="text" id="Durata" placeholder="Durata" v-model="movie.duration">
            <label for="title" class="text-white">Anno</label>
            <input class="rounded px-3 w-64" type="text" id="Anno" placeholder="Anno" v-model="movie.year">
            <label for="title" class="text-white mt-3">Descrizione</label>
            <!-- cambiare in textarea -->
            <textarea class="rounded px-3 w-64 pt-1" name="descrizione" id="descrizione" cols="30" rows="10" placeholder="Descrizione" v-model="movie.description"></textarea>
            <label for="title" class="text-white mt-3">image</label>
            <input class="rounded px-3 w-64" type="text" id="image" placeholder="image" v-model="movie.img">

            <button class="text-white" @click="addFilm()">
                Aggiungi film
            </button>
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