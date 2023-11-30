<template>
    <div>
        <ul>
            <li><a href="#">전체</a></li>
            <li><a href="#"><img class="nav_img" src="/css/img/politics.png" alt="">정치</a></li>
            <li><a href="#"><img class="nav_img" src="/css/img/money.png" alt="">경제</a></li>
            <li><a href="#"><img class="nav_img" src="/css/img/world.png" alt="">세계</a></li>
            <li><a href="#"><img class="nav_img" src="/css/img/tag.png" alt="">테그</a></li>
            <li><a href="#"><img class="nav_img" src="/css/img/employee.png" alt="">노동</a></li>
            <li><a href="#"><img class="nav_img" src="/css/img/environment.png" alt="">환경</a></li>
            <li><a href="#"><img class="nav_img" src="/css/img/cooperation.png" alt="">인권</a></li>
            <li><a href="#"><img class="nav_img" src="/css/img/society.png" alt="">사회</a></li>
            <li><a href="#"><img class="nav_img" src="/css/img/culture.png" alt="">문화</a></li>
            <li><a href="#"><img class="nav_img" src="/css/img/life.png" alt="">라이프</a></li>
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