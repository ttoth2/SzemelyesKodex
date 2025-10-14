import './assets/main.css'
import { createApp } from 'vue'
import { createStore } from 'vuex'
import HelloUser from './components/HelloUser.vue'
import ButtonCounter from './components/ButtonCounter.vue'
import App from './App.vue'

const store = createStore({
    state() {
        counter: 0
    },
    mutations: {
        increment(state) {
             state.counter++
        }
    }
})
const app = createApp(App)
app.component('HelloUser', HelloUser)
app.component('ButtonCounter', ButtonCounter)
app.mount('#app')
