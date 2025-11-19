<script>

export default {
    data() {
        return {
            toggleValue: true
        }
    },
    computed: {
        activeComp() {
            return this.toggleValue ? 'comp-one' : 'comp-two';
        }
    }
}
</script>

<template>

    <h1>Dinamikus komponens</h1>
    <p>Egy gombbal változtathatunk a két komponens között</p>
    <button @click="toggleValue = !toggleValue" >Komponens választó</button>
    <keep-alive include="comp-one">
        <component :is="activeComp"></component>
    </keep-alive>
</template>

<style>
    #app{
        width: 300px;
    }
</style>