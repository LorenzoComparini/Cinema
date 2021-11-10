<template>
    <div class="flex flex-row h-full w-full">
        <div class="flex flex-col w-full h-full items-center text-white">
            <label for="title">Titolo</label>
            <input type="text" id="title" placeholder="title" v-model="movie.title">
            <label for="title">Durata</label>
            <input type="text" id="title" placeholder="title">
            <label for="title">Anno</label>
            <input type="text" id="title" placeholder="title">
            <label for="title">Descrizione</label>
            <input type="text" id="title" placeholder="title">
            <label for="title">image</label>
            <input type="text" id="title" placeholder="title">

            {{ movie}}
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
        }
    }

}
</script>

<style>

</style>