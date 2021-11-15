<template>
  <div class="flex flex-row h-full w-full p-20">
      <div class="flex flex-col">
          <div v-for="reservation in reservations" :key="reservation.id" class="flex flex-row bg-white rounded-lg py-7 px-10 mb-6">
              <p>{{ reservation }}</p>
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
            tickets: [],
            reservations: []
        }
    },

    async mounted(){
        this.reservations = (await axios.get("http://localhost:8000/api/reservations")).data
    }
}
</script>