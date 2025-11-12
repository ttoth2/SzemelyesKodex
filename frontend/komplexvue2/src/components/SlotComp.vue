<template>
 <div>
    <slot v-for="x in foods"
      :key="x.name" 
      :foodName="x.name"
      :foodDesc="x.desc"
      :foodUrl="x.url">
        
    </slot>
 </div>
 <!--
 <div>
    <slot name="bottomSlot">
     
   </slot>
 </div>-->
 <slot
   :staticText="Ez egy statikus szöveg"
   :dynamicText="text"
   ></slot>

<slot
   name="rightslot">
</slot>
</template>
<script>
export default {
   data() {
      return {
         foods: [
            {name:'Alma',desc:'ez egy akna'}
         ]
      }
   }
}
</script>
<style scope>
#app{
   width:300px;
}
 div{
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    border-radius: 10px;
    margin: 10px;
 }
 h2 .greenP{
   background-color: greenyellow;
 }
 
</style>