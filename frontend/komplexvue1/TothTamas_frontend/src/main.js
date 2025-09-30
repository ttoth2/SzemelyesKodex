import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'
import router from './router'
import './assets/openpage.css'


import { createApp } from 'vue'
import App from './App.vue'

createApp(App)
    .use(router)
    .mount('#app')
