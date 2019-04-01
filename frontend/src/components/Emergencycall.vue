<template>
  <div class="container-fluid header-container">
      <Headercomponent></Headercomponent>
      <b-container class="bv-example-row mt-5">
       <div class="d-flex noodoproep-title align-bottom">
        <div class="py-2 pr-2"><h2>{{call.company_name}}</h2></div>
        <div class="mr-auto p-2 mt-9"><h5>{{call.phone }}</h5></div>
        <div class="p-2 mt-9"><h5>{{call.date}}</h5></div>
        <div class="py-2 pl-2 mt-1"><b-button class="homepage-cardbutton" variant="warning" :class="[call.status.toLowerCase()]">{{call.status}}</b-button></div>
        </div>
        <div class="form-group shadow-textarea">
          <textarea class="form-control call-textarea mt-3 mw-100" rows="15" v-model="call.body"></textarea>
        </div>
        <div class="d-flex justify-content-end">
        <router-link to="/"><b-button variant="link" class="text-secondary">Ga terug</b-button></router-link>
        <b-button class="mr-3 text-white" variant="primary" v-on:click="updateCall(call.id)">Update</b-button>
        <b-button v-b-modal.modal-center variant="success" v-b-modal.modal-1>Klaar</b-button>
        </div>
        <!-- Modal Component -->
        <b-modal hide-footer id="modal-center" centered title="Klaar" ref="emergency-modal" data-backdrop="static" data-keyboard="false" class="no-border">
          <p class="my-4">Weet je zeker dat je de noodoproep wil verwijderen?</p>
          <div class="d-flex justify-content-end">
          <b-button class="mr-3" v-on:click="hideModal">Annuleren</b-button>
          <b-button variant="success" v-on:click="deleteCall(call.id)">Klaar</b-button>
            </div>
        </b-modal>
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
        this.$http.get('https://www.herrkoch.nl/api/emergency_call/'+id)
          .then(function(response){
            this.call = response.body;
          });
      },
      //Delete de call uit de database
      deleteCall(id){
        this.$http.delete('https://www.herrkoch.nl/api/emergency_call/delete/'+id)
          .then(function(response){
            this.$router.push({
                path: '/'
            });
        });
      },
      //Update de tekst en de status van de call
      updateCall(e){
        let updateCall = {
            company_name: this.call.company_name,
            phone: this.call.phone,
            status: 'Bezig',
            body: this.call.body,
        }
        this.$http.put('https://www.herrkoch.nl/api/emergency_call/update/'+this.$route.params.id, updateCall)
            .then(function(response){
                this.$router.push({path: '/'});
            });
      e.preventDefault();
      },
            hideModal() {
        this.$refs['emergency-modal'].hide()
      },
    },
    
  created: function(){
    this.fetchCall(this.$route.params.id);
  }
}
</script>

<style>

</style>
