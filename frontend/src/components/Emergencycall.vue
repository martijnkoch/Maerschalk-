<template>
    <div class="container-fluid header-container">
        <Headercomponent></Headercomponent>
        <router-link to="/">Go Back</router-link>
            <h1>Test</h1>
            <h2>{{call.company_name}}</h2>
            <h2>{{call.phone}}</h2>
    </div>
</template>

<script>
import Headercomponent from './Headercomponent.vue'

export default {
  name: 'app',
  data () {
      return {
        call: []
      }
    },
    components: {
      'Headercomponent': Headercomponent,
    },
    methods: {
      fetchCall(id){
        this.$http.get('http://localhost:8888/api/emergency_call/'+id)
          .then(function(response){
            console.log(response.body);
            this.call = response.body;
          });
      }
  },
  created: function(){
    this.fetchCall(this.$route.params.id);
  }
}
</script>

<style>

</style>
