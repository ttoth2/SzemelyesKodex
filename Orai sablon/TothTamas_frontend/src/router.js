import {createRouter, createWebHistory} from 'vue-router'
import Home from './pages/Home.vue'
import Offers from './pages/Offers.vue'
import NewAd from './pages/NewAd.vue'



const routes = [
{
    path: '/',
    name: 'Home',
    component: Home
},
{
    path: '/offers',
    name: 'Offers',
    component: Offers
    },
{
    path: '/newad',
    name: 'NewAd',
    component: NewAd
},
]

const router = createRouter({
    history: createWebHistory(),
    routes
})
export default router