<template>
<div class="container-fluid header-container">
    <Headercomponent></Headercomponent>

<b-container class="bv-example-row mt-7">
   
    <h1>Noodoproepen</h1>
   
    <b-row>
        <b-col>
            <b-card
            title="Royal Canin"
            tag="article"
            style="max-width: 25rem;"
            >

            <b-card-text>Team development</b-card-text>
            <b-card-text>06 12 34 56 78</b-card-text>

            <b-button href="#" class="float-right" variant="primary">New</b-button>
            </b-card>
        </b-col>
        
        <b-col>
            <b-card
            title="Makita"
            tag="article"
            style="max-width: 25rem;"
            >

            <b-card-text>Team development</b-card-text>
            <b-card-text>06 12 34 56 78</b-card-text>

            <b-button href="#" class="float-right" variant="primary">New</b-button>
            </b-card>
        </b-col>
        
        <b-col>
            <b-card
            title="Card Title"
            tag="article"
            style="max-width: 25rem;"
            >

            <b-card-text>Team development</b-card-text>
            <b-card-text>06 12 34 56 78</b-card-text>

            <b-button href="#" class="float-right" variant="primary">New</b-button>
            </b-card>
        </b-col>
    </b-row>
</b-container>
   
    
</div>
</template>

<script>
import Headercomponent from './Headercomponent.vue'

export default {
  name: 'app',
  components: {
    'Headercomponent': Headercomponent,
  },
  methods: {
      fetchCustomers(){
        this.$http.get('http://localhost:8888/api/customers')
          .then(function(response){
            console.log(response.body);
          });
      }
    },
    created: function(){
      if(this.$route.query.alert){
        this.alert = this.$route.query.alert;
      }
      this.fetchCustomers();
    },
}
</script>