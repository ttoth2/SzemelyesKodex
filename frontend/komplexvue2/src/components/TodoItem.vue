<template>
    
    <div class="pinkBall"></div>
        <li v-bind="$attrs">{{ itemName }}</li>

    <div class="pinkBall"></div>
</template>
<script>
    export default{
        props: ['itemName']
    }
</script>