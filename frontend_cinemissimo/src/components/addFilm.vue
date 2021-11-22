<template>
    <div class="flex flex-row h-full w-full justify-center pt-10">
        <div class="flex flex-col h-full w-1/4 justify-center ">
            <label for="title" class="text-white mb-2">Titolo</label>
            <input class="rounded px-3 w-full py-1 outline-none" type="text" id="title" placeholder="Titolo" v-model="movie.title">
            <label for="title" class="text-white mb-2 mt-3">Durata</label>
            <input class="rounded px-3 w-full py-1 outline-none" type="text" id="Durata" placeholder="Durata" v-model="movie.duration">
            <label for="title" class="text-white mb-2 mt-3">Anno</label>
            <input class="rounded px-3 w-full py-1 outline-none" type="text" id="Anno" placeholder="Anno" v-model="movie.year">
            <label for="title" class="text-white  mb-2 mt-3 outline-none">Descrizione</label>
            <textarea class="rounded px-3 w-full pt-1 py-1 outline-none" name="descrizione" id="descrizione" cols="30" rows="10" placeholder="Descrizione" v-model="movie.description"></textarea>
            <label for="title" class="text-white  mb-2 mt-3">Immagine</label>
            <input class="rounded px-3 w-full py-1 outline-none" type="text" id="image" placeholder="Url immagine" v-model="movie.img">

            <div class="w-full flex flex-row justify-end mt-7">
                <button class="rounded-lg py-1 px-4" 
                    @click="addFilm()"
                    :disabled="this.movie.title == '' 
                           || this.movie.year == null
                           || this.movie.duration == null
                           || this.movie.description == ''
                           || this.movie.img == ''
                              "
                    :class="{
                        'cursor-not-allowed bg-gray-600 text-white': 
                           this.movie.title == '' 
                           || this.movie.year == null
                           || this.movie.duration == null
                           || this.movie.description == ''
                           || this.movie.img == '',
                        'cursor-pointer  bg-giallo text-blu-dark': 
                           this.movie.title != '' 
                           && this.movie.year != null
                           && this.movie.duration != null
                           && this.movie.description != ''
                           && this.movie.img != ''
                        }"
                >
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
        }
    },

    methods: {
        async addFilm() {
            await axios.post("http://localhost:8000/api/movies/create", this.movie)   
            this.$router.push("/home")
        }
    }

}
</script>