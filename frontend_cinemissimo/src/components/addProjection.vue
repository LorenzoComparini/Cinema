<template>
    <div class="flex flex-row h-full w-full justify-center pt-10">
        <div class="flex flex-col h-full w-1/4 justify-center ">
            <label for="title" class="text-white mb-2">Data e Ora</label>
            <input class="rounded px-3 w-full py-1 outline-none" type="datetime-local" id="title" placeholder="title" v-model="projection.date">

            <div class="flex flex-row my-1 mt-3 content-center">
                <label for="3d" class="text-white mb-2 mr-3">3D</label>
                <input type="checkbox" name="" id="3d" v-model="projection['3d']" class="outline-none w-6 h-6">
            </div>

            <label for="title" class="text-white mb-2">Stanza</label>
            <select name="" id="" v-model="projection.room_id" class="rounded px-3 w-full py-1 outline-none">
                <option v-for="room in rooms" :key="room.id" :value="room.id">{{ room.room_name }}</option>
            </select>

            <div class="w-full flex flex-row justify-end mt-7">
                <button class="rounded-lg py-1 px-4" 
                    @click="newProjection()"
                    :disabled="this.projection.date == null 
                           || this.projection.room_id == null
                          "
                    :class="{
                        'cursor-not-allowed bg-gray-600 text-white': 
                           this.projection.date == null
                           || this.projection.room_id == null,
                        'cursor-pointer bg-giallo text-blu-dark': 
                           this.projection.date != null
                           && this.projection.room_id != null
                        }"
                >
                    Aggiungi proiezione
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: "addProjection",

    data(){
        return{

            rooms: [],

            projection: {
                movie_id: null,
                date: null,
                '3d': false,
                room_id: null
            }
        }   
    },
    async mounted(){
        this.rooms = (await axios.get("http://localhost:8000/api/rooms")).data
        let movie_id = this.$route.params.movie_id
        this.projection.movie_id = movie_id
    },

    methods:{
        async newProjection(){
            await axios.post("http://localhost:8000/api/projection/create", this.projection)   
            this.$route.push('/movies/schedule/' + this.projection.movie_id)
        }
    }
}
</script>
