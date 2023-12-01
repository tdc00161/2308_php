<template>
    <div>
        <ul>
            <li>전체></li>
            <li @click="$store.commit('flgTabUI', 1)"><img class="nav_img" src="/css/img/politics.png" alt="">정치</li>
            <li @click="$store.commit('flgTabUI', 2)"><img class="nav_img" src="/css/img/money.png" alt="">경제</li>
            <li @click="$store.commit('flgTabUI', 3)"><img class="nav_img" src="/css/img/world.png" alt="">세계</li>
            <li @click="$store.commit('flgTabUI', 4)"><img class="nav_img" src="/css/img/tag.png" alt="">테그</li>
            <li @click="$store.commit('flgTabUI', 5)"><img class="nav_img" src="/css/img/employee.png" alt="">노동</li>
            <li @click="$store.commit('flgTabUI', 6)"><img class="nav_img" src="/css/img/environment.png" alt="">환경</li>
            <li @click="$store.commit('flgTabUI', 7)"><img class="nav_img" src="/css/img/cooperation.png" alt="">인권</li>
            <li @click="$store.commit('flgTabUI', 8)"><img class="nav_img" src="/css/img/society.png" alt="">사회</li>
            <li @click="$store.commit('flgTabUI', 9)"><img class="nav_img" src="/css/img/culture.png" alt="">문화</li>
            <li @click="$store.commit('flgTabUI', 10)"><img class="nav_img" src="/css/img/life.png" alt="">라이프</li>
        </ul>
    </div>
</template>
<script>
    export default {
        name:'NavComponent',
    }
</script>
<style>
    @import url('/css/common.css');
ul {
    list-style: none;
    height: 60px;
    line-height: 60px;
    display: flex;
    justify-content: center;
    background-color: antiquewhite;
}
li {
    float:left;
    font-weight: 700;
    margin: 0 20px 0 20px;
}

.nav_img {
    width: 15px;
    height: 15px;
    box-sizing: border-box;
    justify-content: center;
}
</style>