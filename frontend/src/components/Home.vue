<template>
  <div class="container-fluid header-container">
    <Headercomponent></Headercomponent>
    <b-container class="bv-example-row mt-5">
      <h2 class="mb-4 noodoproep-title">Noodoproepen</h2>
      <b-row>
        <b-col lg="4" md="6" sm="12" v-for="call in orderedCalls" :key="call">
          <router-link v-bind:to="'/call/'+call.id">        
            <b-card tag="article" border-variant="light" class="col-lg-12 col-md-12 col-sm-12 shadow-sm p-3 mb-5 bg-white rounded hvr-grow-shadow">
              <div class="card-line" :class="[call.status]"></div>
              <h4 class="card-title">{{call.company_name}}</h4>
              <b-card-text class="pt-4 mt-4 ml-2">Datum: {{call.date}}</b-card-text>
              <b-card-text class="pt-2 ml-2">Nummer: {{call.phone}}</b-card-text>
              <router-link v-bind:to="'/call/'+call.id">
                <b-button class="float-right homepage-cardbutton mt-3" variant="warning" :class="[call.status.toLowerCase()]">{{call.status}}</b-button>
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
    computed: {
    // Show de nieuwste calls bovenin aan de hand van de status
    orderedCalls: function () {
        return _.orderBy(this.calls, ['status'])
        .reverse()
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

    setInterval(function () {
      this.fetchCalls();
    }.bind(this), 10000);
  },
}
</script>