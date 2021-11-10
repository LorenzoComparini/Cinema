<template>
    <div class="flex flex-row h-full w-full">
        <div class="flex flex-col w-full h-full items-center">
            <label for="title" class="text-white">Titolo</label>
            <input type="text" id="title" placeholder="title" v-model="movie.title">
            <!-- mettere tutti i v-model -->
            <!-- cambia id -->
            <label for="title">Durata</label>
            <input type="text" id="title" placeholder="title">
            <label for="title">Anno</label>
            <input type="text" id="title" placeholder="title">
            <label for="title">Descrizione</label>
            <!-- cambiare in textarea -->
            <input type="text" id="title" placeholder="title">  
            <label for="title">image</label>
            <input type="text" id="title" placeholder="title">

            {{ movie }}

            <!-- crea un tasto che rimandi alla funzione creata in basso -->
        </div>
    </div>
</template>

<script>
export default {
    name: "addFilm",
    data(){
        return{
            movie: {
                title: "",
                year: null,
                duration: null,
                img: "",
                description:""
            }
            // creare una funzione per fare una chiamata post per creare il film
        }
    }

}
</script>

<style>

</style>