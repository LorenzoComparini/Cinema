<template>
  <div class="flex flex-row bg-rosso w-full items-center px-10">
      <div class="flex flex-col">
          <router-link to="/home" class="text-5xl text-bianco my-5">IL FOTTUTO CINEMA</router-link>
      </div>
      <div class="flex flex-col flex-grow"></div>
      <div class="flex flex-col h-full">
          <div class="flex flex-row h-full items-center">
              <router-link to="/movies/create" active-class=" border-b-8 pt-2" class="flex flex-col justify-center text-bianco ml-6 h-full">Aggiungi film</router-link>
              <router-link to="" active-class="" class="flex flex-col justify-center text-bianco ml-6 h-full">I miei biglietti</router-link>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'Navbar',
    mounted(){
    }
}
</script>