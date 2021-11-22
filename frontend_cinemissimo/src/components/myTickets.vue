<template>
  <div class="flex flex-row h-full w-full p-20">
      <div class="flex flex-col w-full">
          <div v-for="reservation in reservations" :key="reservation.id" class="flex flex-row w-2/5 bg-white rounded-lg py-7 px-10 mb-6">
            <div class="flex flex-col">
                <img :src="reservation.projection.movie.img" class="h-40 mr-7" alt="">
            </div>
            <div class="flex flex-col">
                <p class="text-lg font-semibold">{{ reservation.projection.movie.title }}</p>
                <p class="text-lg font-semibold">Stanza: {{ reservation.projection.room.room_name }}</p>
                <div class="flex flex-row items-center">
                    <p class="font-semibold text-lg mr-3">Posti</p>
                    <p v-for="ticket in reservation.tickets" :key="ticket.id" class="bg-blu mr-1 py-1 px-2 rounded-lg text-white">
                        {{ticket.row}}, {{ticket.col}}
                    </p>
                </div>
                    
                
            </div>
          </div>
      </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'myTickets',

    data(){
        return{
            reservations: []
        }
    },

    async mounted(){
        this.reservations = (await axios.get("http://localhost:8000/api/reservation_details")).data
    }
}
</script>