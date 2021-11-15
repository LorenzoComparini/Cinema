<template>
  <div class="flex flex-row bg-blu w-full items-center px-10">
      <div class="flex flex-col">
          <router-link to="/home" class="text-5xl text-giallo my-5">UCY</router-link>
      </div>
      <div class="flex flex-col flex-grow"></div>
      <div class="flex flex-col h-full">
          <div class="flex flex-row h-full items-center">
              <router-link to="/movies/create" active-class="text-giallo" class="flex flex-col justify-center text-bianco ml-6 h-full">Aggiungi film</router-link>
              <router-link to="/myTickets" active-class="" class="flex flex-col justify-center text-bianco ml-6 h-full">I miei biglietti</router-link>
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