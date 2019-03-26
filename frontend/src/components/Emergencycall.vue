<template>
    <div class="container-fluid header-container">
        <Headercomponent></Headercomponent>
            <b-container class="bv-example-row mt-7">
                <router-link to="/">Go Back</router-link>
                <h2>{{call.company_name}}</h2>
                <h2>{{call.phone}}</h2>
                <b-button variant="danger" v-on:click="deleteCall(call.id)">Delete</b-button>
            </b-container>
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
      },
      deleteCall(id){
          this.$http.delete('http://localhost:8888/api/emergency_call/delete/'+id)
          .then(function(response){
            this.$router.push({
                path: '/'
            });
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
