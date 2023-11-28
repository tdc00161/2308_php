import { createApp } from 'vue'
import App from './components/App.vue'
import store from '../../laravel_vuestagram/resources/js/store.js'

createApp(App)
    .use(store)
    .mount('#app')
