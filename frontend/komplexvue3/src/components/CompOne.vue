<template>
    <div>
        <h2>comp 2</h2>
        <p>chooe food</p>
        <teleport to="body">
            <div id="redDiv">
                hello
            </div>
        </teleport>

    </div>
    
</template>
<script>
export default {
    name: 'CompOne',
    data() {
        return {
            imgSrc:'img/img_question.svg'
        }
    }
}
</script>
<style scoped>
div{
    background-color: lightgreen
}
img{
    float:right;
    height: 100px;
    margin-top: 20px;
}
label:hover{
    Cursor: pointer;
}
#redDiv{
    width: 200px;
    height: 100px;
    background-color:red;
    color:white;
}
</style>