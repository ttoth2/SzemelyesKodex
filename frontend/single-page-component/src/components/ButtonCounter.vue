<template>
    <div>
        <button @click ="counter++"> Add 1</button>
        <p>Counter: {{counter}}</p>
    </div>
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

<style scope>
    p{
        color : blue;
    }
</style>