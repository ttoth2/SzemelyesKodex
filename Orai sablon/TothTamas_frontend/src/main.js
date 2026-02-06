import './assets/openpage.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'
import router from './router.js'

import { createApp } from 'vue'
import App from './App.vue'

import axios from 'axios'


createApp(App)
    .use(router)
    .use(axios)
    .mount('#app')
