<template>
    <div class="h-full w-full px-20 py-10">
        <div class="grid grid-cols-6 w-full gap-8">
            <div v-for="movie in movies" :key="movie.id" class="flex flex-col justify-center cursor-pointer border-b-4 border-blu-dark hover:border-giallo hover:bg-blu py-4 px-2 transition-all duration-500" @click="goToMovieSchedule(movie.id)">
                <img :src="movie.img" alt="" class="w-full mb-2 font-medium rounded">
                <p class="text-bianco">{{ movie.title }}</p>
            </div>
            
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name:'Home',

    data(){
        return{
            movies: []
        }
    },

    async mounted(){
        this.movies = (await axios.get('http://127.0.0.1:8000/api/movies')).data
    },

    methods:{
        goToMovieSchedule(id){
            this.$router.push('movies/schedule/' + id)
        }
    }
}
</script>
