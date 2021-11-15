<template>
  <div class="flex flex-row w-full h-full p-20">
      <div class="flex flex-col h-full w-2/3">
        <div class="flex flex-row w-full h-full">
            <img :src="movie.img" alt="" class="w-80 mr-10">
            <div>
            <p class="text-2xl font-semibold text-bianco mb-4">{{ movie.title }}</p>    
            <p class="text-xl italic text-gray-300">{{ movie.description }}</p>
            </div>
        </div>
      </div>
      <div class="flex flex-col h-full w-1/3 px-8">
        <p class="text-2xl text-bianco">Programmazione</p>
        <div v-for="projection in movie.projections" :key="projection.id" class="text-blu-dark flex flex-row w-full py-3 px-3 bg-giallo hover:bg-yellow-400 cursor-pointer items-center mt-4" @click="goToBuyTicket(projection.id)">
            <div class="flex flex-col">
                <p class="">{{ projection.date }}</p>
                <p>Posti disponibili: {{ projection.room.seats - projection.tickets_count }}</p>
                <p>Stanza: {{ projection.room.room_name }}</p>
            </div>
            <div class="flex flex-col flex-grow"></div>
            <div class="flex flex-col">
                <p class="text-2xl font-bold text-white bg-blu-dark rounded-full p-1">></p>
            </div>
        </div>
      </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'MovieSchedule',

    data(){
        return{
            movie: {},
        }
    },

    async mounted(){
        let movie_id = this.$route.params.id
        this.movie = (await axios.get('http://127.0.0.1:8000/api/movies/' + movie_id)).data
        console.log(('http://127.0.0.1:8000/api/movies/schedule/' + movie_id));
    },

    methods: {
        goToBuyTicket(id){
            this.$router.push('ticket/' + id) // inserire link api
        }
    }

}
</script>

