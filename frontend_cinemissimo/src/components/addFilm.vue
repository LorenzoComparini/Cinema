<template>
    <div class="flex flex-row h-full w-full">
        <div class="flex flex-col w-full h-full items-center">
            <label for="title" class="text-white">Titolo</label>
            <input type="text" id="title" placeholder="title" v-model="movie.title">
            <label for="title">Durata</label>
            <input type="text" id="Durata" placeholder="title" v-model="movie.duration">
            <label for="title">Anno</label>
            <input type="text" id="Anno" placeholder="title" v-model="movie.year">
            <label for="title">Descrizione</label>
            <!-- cambiare in textarea -->
            <textarea name="descrizione" id="descrizione" cols="30" rows="10" placeholder="Descrizione" v-model="movie.description"></textarea>
            <label for="title">image</label>
            <input type="text" id="image" placeholder="title" v-model="movie.img">

            {{ movie }}

            <button @click="addFilm()">
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