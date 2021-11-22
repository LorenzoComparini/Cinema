<template>
  <div class="flex flex-row h-full w-full pt-10">
      <div class="flex flex-col w-1/6"></div>
      <div class="flex flex-col w-4/6">
          <div v-for="reservation in reservations" :key="reservation.id" class="flex flex-row max-w-screen-md w-full bg-white rounded-lg p-5 mb-6 m-auto">
            <div class="flex flex-col">
                <img :src="reservation.projection.movie.img" class= "mr-7" alt="">
            </div>
            <div class="flex flex-col h-full w-full pl-8">
                <div class="flex justify-between w-full">
                    <p class="text-xl font-semibold">{{ reservation.projection.movie.title }}</p>
                    <button
                        class="cursor-pointer hover:bg-giallo rounded-full p-3"
                        @click="deleteReservation()"
                    > 
                        <span class="material-icons pt-1">
                            delete
                        </span>
                    </button>
                </div>
                <p class="text-lg italic">{{ reservation.name }} {{ reservation.surname }}</p>

                <div class="flex flex-row items-end h-full w-auto flex-wrap">
                    <p class="font-semibold text-lg mr-3">Posti:</p>
                    <p v-for="ticket in reservation.tickets" :key="ticket.id" class="bg-blu mr-1 py-1 px-2 rounded-lg text-white">
                        {{ticket.row}}, {{ticket.col}}
                    </p>
                </div>
                <p class="text-lg font-semibold mt-auto">Stanza: {{ reservation.projection.room.room_name }}</p>
            </div>
          </div>
      </div>
      <div class="flex flex-col w-1/6"></div>

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