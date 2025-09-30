import './assets/main.css'
import { createApp } from 'vue'
import HelloUser from './components/HelloUser.vue'
import ButtonCounter from './components/ButtonCounter.vue'
import App from './App.vue'


const app = createApp(App)
app.component('HelloUser', HelloUser)
app.component('ButtonCounter', ButtonCounter)
app.mount('#app')
