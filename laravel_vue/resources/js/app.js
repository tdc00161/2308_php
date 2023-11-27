require('./bootstrap');

import { createApp } from 'vue';
import router from '../js/router.js';
import store from '../js/store.js';
import AppComponent from '../components/AppComponent.vue';

//  뷰파일에 따라 from 뒤에 주소만 변경

createApp({
    components: {
        AppComponent,
    }
})
.use(router)
.use(store)
.mount('#app');

