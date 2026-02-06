<template>
<h1 class="text-center pt-2 pt-lg-4">Ajánlatok</h1>
<table>
    <tr>
        <th>kategória</th>
        <th>leírás</th>
        <th>Dátum</th>
        <th>Tehermentes</th>
        <th>Fénykép</th>
    </tr>
    <tr v-for="ingatlan in ingatlanok" :key="ingatlan.id">
        <td class="text-center">{{ingatlan.kategoriaNev}}</td>
        <td class="text-center">{{ingatlan.leiras }}</td>
        <td class="text-center">{{ingatlan.hirdetesDatuma }}</td>
        <td class="text-center" :class="ingatlan.tehermentes ? 'zöld' : 'piros'">{{ingatlan.tehermentes ? "igen" : "nem" }}</td>
        <td class="text-center"><img :src="ingatlan.kepUrl" class="kep"></td>
    </tr>
</table>
</template>
<script>

import axios from 'axios';
axios.defaults.baseURL = 'http://localhost:5000/api/';
export default {
    name: 'Offers',
    data() {
        return {
            ingatlanok: []
        }
    },
    mounted() {
        axios.get('/ingatlan')
            .then(response => {
                this.ingatlanok = response.data;
            })
            .catch(error => {
                console.log(error);
            });
    },
}

</script>
<style>
table {
    width: 80%;
    border-collapse: collapse;
    margin: 20px auto;
    box-shadow: 5px 5px 15px gray;
}
table th, table td {
    border-bottom: 1px solid black;
    padding: 8PX;
    box-shadow: 5px 5px 5px lightgrey;
}
.kep{
    margin:5 auto;
    height: 100px;
    display: block;
}

.zöld{
    color: lightgreen;
    font-weight: bold;
}
.piros{
    color: lightcoral;
    font-weight: bold;
}

</style>