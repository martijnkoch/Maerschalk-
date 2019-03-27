<template>
    <div class="container-fluid header-container">
        <Headercomponent></Headercomponent>
        <b-container class="bv-example-row mt-6">
        <h2 class="mb-4">Team</h2>
            <b-col v-for="employee in employees" :key="employees">              
                <b-card tag="article">
                <b-img :src="employee.image" />
                <h4 class="card-title"> {{employee.first_name}} {{employee.last_name}} </h4>
                <b-card-text>{{employee.job}}</b-card-text>             
                    <b-button class="float-right" variant="primary">New</b-button>             
                </b-card>         
            </b-col>
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
        employees: []
      }
    },
    components: {
      'Headercomponent': Headercomponent,
    },
    methods: {
      // Fetch alle calls uit de API 
      fetchEmployees(){
        this.$http.get('http://localhost:8888/api/employees')
          .then(function(response){
            console.log(response.body);
            this.employees = response.body;
          });
      }
  },
  created: function(){
    this.fetchEmployees();
  }
}
</script>

<style>

</style>
