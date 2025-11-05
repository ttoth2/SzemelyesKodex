<template>
    <div @click="FAV" >
        <h2>
            {{ foodName }}
            <img src="../img_quality.svg" v-show="isFavourite" title="Komákoskép">
        </h2>
         <p>{{ foodDesc }}</p>
        
    </div>
     <!--
    <div @click="FAV" >
        <h2>{{ foodName }}
        <img src="../img_quality.svg" v-show="Fav" title="Komákoskép">
        </h2>
        <p>{{ foodDesc }}</p>
        
        !-- <p id="red">klikkelések:{{  clicks}}</p> --
    </div>-->
</template>
<script>
export default {

    props: [
        'foodName',
        'foodDesc',
        'isFavourite'
    ],
    emits:['toggle-favorite'],
    methods: {
        FAV() {
            //this.Fav = !this.Fav;
            this.$emit('toggle-favorite', this.foodName)
        }
    }

   /* props: {
        foodName: {
            type: String,
            required: true,
        },
        foodDesc: {
            type: String,
            required: false,
            default: 'Nincs leiras',
            validator: function (value) {
                if (20 < value && value.lenght < 50) {
                    return true;
                } else {
                    return false;
                }
            }
        } ,
        isFavourite: {
            type: Boolean,
            required: false,
            default: false,
        },
    },
    data() {
        return {
            Fav: this.isFavourite
        }
    },
    

    /*data() {
        return {
            name: 'Alma',
            message: 'szeretem az amlát',
            clicks: 0
        }
    },
    methods: {
        FAV() {
            this.Fav = !this.Fav;
        }
    }
    */
}
</script>
<style scoped>
#red{
    color: red;
    font-weight: bold;
}
img{
    height: 1.5em;
    float: right;
}
p{
    color:red
}
</style>