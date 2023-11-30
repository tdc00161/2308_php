require('./bootstrap');


import { createApp } from 'vue'
import MainComponent from '../components/MainComponent.vue'
import LoginComponent from '../components/LoginComponent.vue'
import RegistrationComponent from '../components/RegistrationComponent.vue'

import store from './store.js'

createApp({
    components: {
        MainComponent,
        LoginComponent,
        RegistrationComponent,
    }
})
    .use(store)
    .mount('#app');