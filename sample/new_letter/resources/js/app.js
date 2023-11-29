require('./bootstrap');

import { createApp } from 'vue'
import AppComponent from '../components/AppComponent.vue'
import RegistrationComponent from '../components/RegistrationComponent.vue'
import store from './store.js'

createApp({
    components: {
        AppComponent,
        RegistrationComponent,
    }
})
    .use(store)
    .mount('#app');