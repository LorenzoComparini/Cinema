<template>
    <div class="pt-10 text-bianco flex flex-row w-full h-full justify-center">
        <div class="flex flex-col w-min h-full">
            <div class="flex flex-row w-full justify-center text-black mb-8">
                <div class="flex flex-col">
                    <label for="name" class="text-white mb-1">Nome</label>
                    <input id="name" type="text" placeholder="Nome" v-model="reservation.name" class="mr-4 px-3 outline-none py-1">
                </div>
                <div class="flex flex-col">
                    <label for="surname" class="text-white mb-1">Cognome</label>
                    <input id="surname" type="text" placeholder="Cognome" v-model="reservation.surname" class="mr-4 px-3 outline-none py-1">
                </div>
                <div class="flex flex-col">
                    <label for="email" class="text-white mb-1">Email</label>
                    <input id="email" type="text" placeholder="email" v-model="reservation.mail" class="mr-4 px-3 outline-none py-1">
                </div>
                
            </div>
            <div v-for="row in room.rows" :key="row" class="flex flex-row w-full justify-center text-black my-4">
                <div v-for="col in room.cols" :key="col" 
                    @click="aggiungePostoALista(row, col)" 
                    :class="{
                        'bg-green-400 hover:bg-green-600': !foundTicket(row, col),
                        'bg-yellow-400 hover:bg-yellow-600': foundTicket(row, col)
                    }" 
                    class="w-10 h-10 cursor-pointer mx-2">
                </div>
            </div>
            <button class="text-blu-dark font-semibold bg-giallo rounded-lg py-1 px-4 ml-auto mt-4" @click="saveReservation()">
                    Aggiungi film
            </button>
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
            room: {},
            reservation: {
                projection_id: null,
                name: "",
                surname: "",
                mail: "",
                list: []
            },
        }
    },

    async mounted(){
        let projection_id = this.$route.params.id
        this.reservation.projection_id = projection_id
        this.projection = (await axios.get('http://127.0.0.1:8000/api/movies/schedule/projection/' + projection_id)).data
        this.room = (await axios.get('http://127.0.0.1:8000/api/movies/schedule/projection/room/' + this.projection.room_id)).data
    },

    methods: {
        /** Cerca il posto da sedere nella lista.
         * @param row{number} Riga del posto da sedere
         * @param col{number} Colonna del posto da sedere
         * @returns{boolean} Ritorna vero se trova il posto già nella lista e falso altrimenti.
         * */
        foundTicket(row, col) {
            let foundTicket = this.reservation.list.find(el => {
                return (el.row == row && el.col == col)
            })
            return foundTicket ? true : false;
        },
        /**Cerca il posto da sedere nella lista.
         * Se non lo trova, lo aggiunge alla lista.
         * Se lo trova, lo rimuova dalla lista.
         * @param row{number} Riga del posto da sedere
         * @param col{number} Colonna del posto da sedere
         *   */ 

        aggiungePostoALista(row, col) {
            let foundTicket = this.reservation.list.find(el => {
                return (el.row == row && el.col == col)
            })

            if (!foundTicket) {
                this.reservation.list.push({
                    row,
                    col
                })
            } else { 
                let index = this.reservation.list.indexOf(foundTicket);
                this.reservation.list.splice(index, 1);
            }
        },

        /**
         * Salva la prenotazione del posto e la manda al backend
         */
        async saveReservation(){
            await axios.post("http://localhost:8000/api/reservations/save", this.reservation)
            
            // this.$router.push('/home')
        }
    }
}
</script>
