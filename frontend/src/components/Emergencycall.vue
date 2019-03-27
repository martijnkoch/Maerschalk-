<template>
    <div class="container-fluid header-container">
        <Headercomponent></Headercomponent>
            <b-container class="bv-example-row mt-7">
                <router-link to="/"><b-button variant="link">Go Back</b-button></router-link>
                <h2>{{call.company_name}}</h2>
                <h2>{{call.phone}}</h2>
                <div class="form-group shadow-textarea">
                  <textarea class="form-control call-textarea" rows="5" v-model="call.body"></textarea>
                </div>
                <b-button variant="primary" v-on:click="updateCall(call.id)">Primary</b-button>
                <b-button variant="danger" v-on:click="deleteCall(call.id)">Delete</b-button>
            </b-container>
    </div>
</template>

<script>
 /* eslint-disable */
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
      //Fetch een call aan de hand van de ID 
      fetchCall(id){
        this.$http.get('http://localhost:8888/api/emergency_call/'+id)
          .then(function(response){
            console.log(response.body);
            this.call = response.body;
          });
      },
      //Delete de call uit de database
      deleteCall(id){
        this.$http.delete('http://localhost:8888/api/emergency_call/delete/'+id)
          .then(function(response){
            this.$router.push({
                path: '/'
            });
        });
      },
      updateCall(e){
        let updateCall = {
            company_name: this.call.company_name,
            phone: this.call.phone,
            body: this.call.body,
        }
        this.$http.put('http://localhost:8888/api/emergency_call/update/'+this.$route.params.id, updateCall)
            .then(function(response){
                this.$router.push({path: '/'});
            });
      e.preventDefault();
      }
    },
  created: function(){
    this.fetchCall(this.$route.params.id);
  }
}
</script>

<style>

</style>
