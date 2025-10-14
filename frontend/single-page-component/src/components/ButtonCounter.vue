<template lang="pug">
    <div>
        button(@click ="counter++")  Add 1
        p Counter: {{counter}}

</template>

<script>
    export default{
        data() {
            return {
                counter: 0
            }
        }
    }
</script>

<style lang="less" scope>
@color: green;
    p{
        color : @color;
    }
</style>