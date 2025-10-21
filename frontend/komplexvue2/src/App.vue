<script>
//import HelloWorld from './components/HelloWorld.vue'
export default {
  data() {
    return {
      foods: [
        {
          name: 'alma',
          desc: 'fán terem azt megeszem',
          favorite: true
        },
        {
          name: 'pizza',
          desc: 'a pizát somma süti',
          favorite: true
        },
        {
          name: 'rizs',
          desc: 'a risz egy soma féle gabona',
          favorite: false
        },
        {
          name: 'hal',
          desc: 'soma halászta',
          favorite: false
        },
        {
          name: 'setemény',
          desc: 'koma mind megette',
          favorite: false
        }
      ]
    };
  },
  methods: {
    removeItem() {
      this.foods.splice(0, 1);
    },
    receiveEmit(foodId) {
      const foundFood = this.foods.find(
        food=> food.name===foodId
      )
      foundFood.favorite =  !foundFood.favorite
    }
  }
}
</script>

<template>
  <h1>{{ message }}</h1>
  <h1>ÉTELEK</h1>
  <button @click="removeItem">Törlés</button>
  <div id="wrapper">
    <food-item v-for="x in foods"
    :key ="x.name"
    :food-name="x.name"
    :food-desc="x.desc"
    :is-favourite="x.favorite"
    @toggle-favorite="receiveEmit"

    />
    <!--
    <food-item 
    food-name="Pizza"
    food-desc="A Pizza a kománál készül"
    :is-favourite="true"/>
    <food-item 
    food-name="Rizs"
    food-desc="A Rizset Soma termelte"/>-->
  </div>
  

</template>

<style>
  #wrapper> div{
    border:dashed 1px black;
    display: inline-block;
    flex-basis: 120px;
    margin: 10px;
    padding: 10px;
    background-color: rgb(43, 255, 43);
    border-radius: 5%;
    -webkit-user-select: none; /* Safari */
    -ms-user-select: none; /* IE 10 and IE 11 */
    user-select: none; /* Standard syntax */
  }

  #wrapper> div:hover{
    cursor: pointer
  }
  #wrapper{
    display: flex;
    flex-wrap: wrap;
  }

</style>
