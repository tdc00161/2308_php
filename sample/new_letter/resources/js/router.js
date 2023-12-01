import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';
import RegistrationComponent from '../components/RegistrationComponent.vue';
import MypageComponent from '../components/MypageComponent.vue';

const routes = [
    {
        path: '/',
        redirect: '/main',
    },
    {
        path: '/main',
        component: BoardComponent,
    },
    {
        path: '/login',
        component: LoginComponent,
    },
    {
        path: '/regist',
        component: RegistrationComponent,
    },
    {
        path: '/mypage',
        component: MypageComponent,
    },


];

const router = createRouter({
    history: createWebHistory(),
    routes,

});

export default router;
