<template>
    <div class="container-fluid header-container">
        <Headercomponent></Headercomponent>
        <h1>Team </h1>
    </div>
</template>


<script>
import Headercomponent from './Headercomponent.vue'

export default {
  name: 'app',
  data () {
      return {
        calls: []
      }
    },
    components: {
      'Headercomponent': Headercomponent,
    }
}
</script>

<style>

</style>
