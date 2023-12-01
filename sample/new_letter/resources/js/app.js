require('./bootstrap');

import { createApp } from 'vue';
import MainComponent from '../components/MainComponent.vue';
// import HeaderComponent from '../components/layout/HeaderComponent.vue';
// import FooterComponent from '../components/layout/FooterComponent.vue';
// import LoginComponent from '../components/LoginComponent.vue';
// import RegistrationComponent from '../components/RegistrationComponent.vue';
import router from './router.js';
import store from './store.js';

createApp({
    components: {
        MainComponent,
        // LoginComponent,
        // RegistrationComponent,
    },
})
    .use(router)
    .use(store)
    .mount('#app');