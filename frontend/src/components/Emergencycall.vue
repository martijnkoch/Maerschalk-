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
        <b-button class="mr-3" variant="primary" v-on:click="updateCall(call.id)">Update de tekst</b-button>
        <b-button variant="danger" v-b-modal.modal-1>Verwijder de call</b-button>
        <!-- Modal Component -->
        <b-modal hide-footer id="modal-1" title="Wijziging" ref="emergency-modal">
          <p class="my-4">Weet je zeker dat je de call wil deleten?</p>
          <b-button class="mr-3" v-on:click="hideModal">Annuleren</b-button>
          <b-button variant="danger" v-on:click="deleteCall(call.id)">Delete</b-button>
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
            console.log(response.body);
            this.call = response.body;
          });
      },
      hideModal() {
        this.$refs['emergency-modal'].hide()
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
      updateCall(e){
        let updateCall = {
            company_name: this.call.company_name,
            phone: this.call.phone,
            body: this.call.body,
        }
        this.$http.put('https://www.herrkoch.nl/api/emergency_call/update/'+this.$route.params.id, updateCall)
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
