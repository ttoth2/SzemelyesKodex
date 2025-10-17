<script>
//import HelloWorld from './components/HelloWorld.vue'
export default {
  data() {
    return {
      message: 'Hello VÚ !'
    }
  }
}
</script>

<template>
  <h1>{{ message }}</h1>
  <h1>ÉTELEK</h1>
  <div id="wrapper">
    <food-item 
    food-name="Alma"
    food-desc="A külömböző Almák a fákon teremnek"/>
    <food-item 
    food-name="Pizza"
    food-desc="A Pizza a kománál készül"
    :is-favourite="true"/>
    <food-item 
    food-name="Rizs"
    food-desc="A Rizset Soma termelte"/>
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
    border-radius: 40%;
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
