require('./bootstrap');

import { createApp } from 'vue';
import App from '../components/App.vue';

//  뷰파일에 따라 from 뒤에 주소만 변경

createApp({
    components: {
        App,
    }
}).mount('#app');

