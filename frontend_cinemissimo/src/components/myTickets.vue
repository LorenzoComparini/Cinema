<template>
  <div class="flex flex-row h-full w-full pt-10">
      <div class="flex flex-col w-1/3"></div>
      <div class="flex flex-col w-1/3">
          <div v-for="reservation in reservations" :key="reservation.id" class="flex flex-row max-w-screen-md w-full bg-white rounded-lg p-5 mb-6 m-auto">
            <div class="flex flex-col">
                <img :src="reservation.projection.movie.img" class="h-48 min-w-max mr-7" alt="">
            </div>
            <div class="flex flex-col h-full w-full pl-8">
                <div class="flex justify-between w-full">
                    <p class="text-xl font-semibold">{{ reservation.projection.movie.title }}</p>

                    <img
                    class="cursor-pointer hover:bg-giallo rounded-full p-2"
                    src="https://img.icons8.com/material-outlined/24/000000/trash--v1.png"
                    @click="deleteReservation()"
                    />
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
      <div class="flex flex-col w-1/3"></div>

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