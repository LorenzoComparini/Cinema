<template>
  <div class="flex flex-row bg-rosso w-full items-center px-10 py-7">
      <div class="flex flex-col">
          <router-link to="/home" class="text-5xl text-bianco">Cinema</router-link>
      </div>
      <div class="flex flex-col flex-grow"></div>
      <div class="flex flex-col">
          <div class="flex flex-row">
              <router-link to="" class="text-bianco">I miei biglietti</router-link>
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

