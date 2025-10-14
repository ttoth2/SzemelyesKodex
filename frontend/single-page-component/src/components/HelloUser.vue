<template lang="pug">
    div
        p Hello {{ name }}
        h1 This is a header
        p This is a aragraph
 
        
</template>
    
<script>
    export default {
        props: {
            name: String
        }
    }

</script>

<style lang="less">
@color: red;
    p{
        color: @color;
    };
</style>
