<template>
    <div class="p-20 text-bianco flex flex-row w-full h-full">
        <div class="flex flex-col w-full h-full">
            <div class="flex flex-row w-full justify-center text-black mb-8">
                <div class="flex flex-col">
                    <label for="name" class="text-white mb-1">Nome</label>
                    <input id="name" type="text" placeholder="Nome" class="mr-4 px-3 outline-none py-1">
                </div>
                <div class="flex flex-col">
                    <label for="surname" class="text-white mb-1">Cognome</label>
                    <input id="surname" type="text" placeholder="Cognome" class="mr-4 px-3 outline-none py-1">
                </div>
                <fiv class="flex flex-col">
                    <label for="email" class="text-white mb-1">Email</label>
                    <input id="email" type="text" placeholder="email" class="mr-4 px-3 outline-none py-1">
                </fiv>
                
            </div>
            <div v-for="row in room.rows" :key="row" class="flex flex-row w-full justify-center text-black my-4">
                <div v-for="col in room.cols" :key="col" class="w-10 h-10 bg-green-400 hover:bg-green-600 cursor-pointer mx-2"></div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'buyTicket',

    data(){
        return{
            projection: {},
            room: {}
        }
    },

    async mounted(){
        let projection_id = this.$route.params.id
        this.projection = (await axios.get('http://127.0.0.1:8000/api/movies/schedule/projection/' + projection_id)).data
        this.room = (await axios.get('http://127.0.0.1:8000/api/movies/schedule/projection/room/' + this.projection.room_id)).data
        
    }
}
</script>
