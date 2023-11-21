import { createWebHistory, createRouter } from 'vue-router'
// 뷰 라우터 안에 여러가지 정의할 꺼 있을 때 사용
import List from './components/List.vue';
import Add from './components/Add.vue';
import Edit from './components/Edit.vue';

// 기본형태임
// const routes = [
//     {
//         path: "/",
//         component: 컴포넌트, 
//     }
// ];


const routes = [
    {
        path: "/",
        redirect: '/List', 
    },
    {
        path: "/list",
        redirect: List, 
    },
    {
        path: "/add",
        component: Add, 
    },
    {
        path: "/edit",
        component: Edit, 
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,

});

export default router;
