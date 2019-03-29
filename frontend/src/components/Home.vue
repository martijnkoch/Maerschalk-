<template>
  <div class="container-fluid header-container">
    <Headercomponent></Headercomponent>
    <b-container class="bv-example-row mt-6">
      <h2 class="mb-4">Noodoproepen</h2>
      <b-row>
        <b-col lg="4" md="6" sm="12" v-for="call in calls" :key="call">
          <router-link v-bind:to="'/call/'+call.id">        
            <b-card tag="article" border-variant="light" class="shadow-sm p-3 mb-5 bg-white rounded">
              <h4 class="card-title">{{call.company_name}}</h4>
              <b-card-text>{{call.phone}}</b-card-text>
              <router-link v-bind:to="'/call/'+call.id">
                <b-button class="float-right" variant="primary">New</b-button>
              </router-link>
            </b-card>
          </router-link>
        </b-col>
      </b-row>
    </b-container>  
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
    },
    methods: {
      // Fetch alle calls uit de API 
      fetchCalls(){
        this.$http.get('https://www.herrkoch.nl/api/emergency_calls')
          .then(function(response){
            this.calls = response.body;
          });
      }
  },
  created: function(){
    this.fetchCalls();
  }
}
</script>