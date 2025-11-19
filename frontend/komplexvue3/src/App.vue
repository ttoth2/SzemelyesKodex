<script>

export default {
  data() {
    toggleValue: true
  },
  computed: {
    activeComp(){
      return this.toggleValue ? "comp-one" :"comp-two"
    }
  }
}
</script>

<template>
  
  <h1>Dinamikus komponens</h1>
  <p>Egy gombal választhatuk a két komponens között</p>
  <button @click="toggleValue =!toggleValue">komponensek</button>
  <KeepAlive :max="2"> <component :is="activeComp"></component></KeepAlive>
<!--:include="CompOne-->
  
</template>

<style>

</style>
