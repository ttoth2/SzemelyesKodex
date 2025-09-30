<script>
import axios from 'axios'
axios.defaults.baseURL = 'http://localhost:5000'
export default {
    name: "Offers",
    data() {
        return {
            ingatlanok: []
        }
    },
    mounted() {
        axios.get('/api/ingatlan')
            .then(response => {
                this.ingatlanok = response.data;
            })
            .catch(error => {
                console.log( error);
            });
    }
}
</script>

<template>
    <h1 class="mb-4 text-center">
        Ajánlataink
    </h1>
    <table>
        <tr>
            <th>Karegoria</th>
            <th>Leiras</th>
            <th>Hirdetes datuma</th>
            <th>Tehermentes</th>
            <th>Fénykép</th>
        </tr>
        <tr v-for="ingatlan in ingatlanok" :key="ingatlan.id">
            <td class="text-center">{{ ingatlan.kategoriaNev }}</td>
            <td>{{ ingatlanok.loeiras }}</td>
            <td class="text-center ? 'zold' : 'piros'">{{ ingatlan.hirdetasDatuma }}</td>
            <td class="text-center" :class="ingatlan.tehermentes ? 'igen' : 'nem'">{{ ingatlan.tehermentes ? "igen" : "nem" }}</td>
            <td> <img :src="ingatlan.kepUrl" class="kep"></td>
        </tr>
    </table>
</template>

<style>
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
        box-shadow: 5px 5px 15px 5px lightgrey;
    }
    table th,table td {
        border-bottom: 1px solid lightgrey;
        padding: 8px;
        text-align: left;
    }
    table th {
        text-align: center;
    }
    .kep {
        margin: 0 auto;
        display: block;
        height: 100px;
    }
    .zold {
        background-color: lightgreen;
    }
    .piros {
        background-color: lightcoral;
    }
    
</style>