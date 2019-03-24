<template>
  <div id="app" class="wrapper">
    <Sidebarcomponent></Sidebarcomponent>
    <router-view></router-view>
  </div>
</template>

<script>
import Sidebarcomponent from './components/Sidebarcomponent.vue'

export default {
  name: 'app',
  components: {
    'Sidebarcomponent': Sidebarcomponent,
  }
}
</script>

<style>

</style>
