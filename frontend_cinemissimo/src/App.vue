<template>
  <div id="app">
    <div class="flex flex-col bg-nero w-full h-screen">
      <Navbar></Navbar>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue'

export default {
  name: 'App',
  components: {
    Navbar
  }
}
</script>


