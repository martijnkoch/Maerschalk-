<template>
  <div class="container-fluid header-container">
    <Headercomponent></Headercomponent>
    <b-container class="bv-example-row mt-6">
      <h2 class="mb-4">Noodoproepen</h2>

      <b-alert show fade dismissible variant="success">Success Alert</b-alert>

      <b-row>
        <b-col v-for="call in calls" :key="call">
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
      <h2 class="mb-4 mt-4">Emails</h2>
       <!-- Sidebar 
        <table class="table table-light shadow-sm p-3 rounded border-bottom mt-2">
            <thead>
                <tr>
                <th scope="col">Ontvanger</th>
                <th scope="col">Onderwerp</th>
                <th scope="col">Datum</th>
                <th scope="col">Aantal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                </tr>
            </tbody>
        </table> -->
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