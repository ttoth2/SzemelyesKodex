<template>
    <div>
        <h2>Comp 2</h2>
        <input type="text" v-model="msg" placeholder=" write now!">
        <p>Your message:</p>
        <p><strong>{{ this.msg }}</strong></p>
    </div>
    
</template>
<script>
export default {
    name: 'CompTwo',
    data() {
        return {
            msg: ''
        }
    }
}
</script>
<style scoped>
div{
    background-color: lightblue
}
img{
    float:right;
    height: 100px;
    margin-top: 20px;
}
label:hover{
    Cursor: pointer;
}
</style>