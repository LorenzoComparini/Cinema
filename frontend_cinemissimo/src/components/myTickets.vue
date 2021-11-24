<template>
  <div class="flex flex-row h-full w-full pt-10">
      <div class="flex flex-col w-1/4"></div>
      <div class="flex flex-col w-2/4">
          <div v-for="reservation in reservations" :key="reservation.id" class="flex flex-row max-w-screen-md w-full bg-white rounded-md p-5 mb-6 m-auto">
            <div class="flex flex-col">
                <img :src="reservation.projection.movie.img" class= "w-60" alt="">
            </div>
            <div class="flex flex-col h-full w-full pl-8 py-5">
                <div class="flex justify-between w-full items-center">
                    <div>
                        <p class="text-xl font-semibold">{{ reservation.projection.movie.title }}</p>
                        <p class="font-semibold ">{{ reservation.name }} {{ reservation.surname }}</p>
                        <p class="text- italic">{{ reservation.mail }}</p>
                    </div>


                    <button
                        class="cursor-pointer hover:bg-giallo rounded-full w-12 h-12 border-giallo"
                        @click="deleteReservation(reservation.id)"
                    > 
                        <span class="material-icons pt-1 text-3xl">
                            delete_outline
                        </span>
                    </button>
                </div>

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
      <div class="flex flex-col w-1/4"></div>

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
    },

    methods: {
        async deleteReservation(id){
            let url = "http://localhost:8000/api/reservation/delete/" + id;
            await axios.delete(url);
            window.location.reload()
        }
    }
}
</script>