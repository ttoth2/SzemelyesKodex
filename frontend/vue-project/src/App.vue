<script>
import axios from 'axios';
export default {
  data() {
    return {
      data2: null,
      randomMammal: null,
    }
  },
  methods: {
    async fetchData() {

      const response = await fetch("bigLandMammals.json");
      const data = await response.json();
      const randindex = Math.floor(Math.random() * data.results.length);
      this.randomMammal = data.results[randindex];

     
      this.data2 = await axios.get("https://nameday.abalin.net/api/V2/today/budapest");
    }
  }
}
</script>

<template>

  <p>nevnap</p>
  <button @click="fetchData">
    Fetch Data
  </button>

<div v-if="data2" id="dataDiv">
  <p>{{data2.data.message}} </p>
  <p>{{ data2.data.data.hu }}</p>
</div>


<div v-if="randomMammal">
  <h2>{{ randomMammal.name }}</h2>
  <p >
    {{randomMammal.maxWeight}} kg
  </p>

</div>
  
</template>

<style>

</style>
