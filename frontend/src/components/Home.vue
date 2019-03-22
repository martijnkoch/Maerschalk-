<template>
  <div id="app">
    <div class="wrapper">
        <Sidebarcomponent></Sidebarcomponent>

        <!-- Page Content -->
        <div id="content">
            Piemol<br>
            Emo<br>
            Rukker<br>
            Urk<br>
        </div>
    </div>       
</div>
</template>

<script>
import Sidebarcomponent from './Sidebarcomponent.vue'

export default {
  name: 'app',
  components: {
    'Sidebarcomponent': Sidebarcomponent,
  }
}
</script>