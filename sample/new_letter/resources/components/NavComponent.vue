<template>
    <div>
        <ul class="main_ul">
            <li class="main_li"><a href="#">전체</a></li>
            <li class="main_li"><a href="#"><img class="main_ulimg" src="/css/img/politics.png" alt="">정치</a></li>
            <li class="main_li"><a href="#"><img class="main_ulimg" src="/css/img/money.png" alt="">경제</a></li>
            <li class="main_li"><a href="#"><img class="main_ulimg" src="/css/img/world.png" alt="">세계</a></li>
            <li class="main_li"><a href="#"><img class="main_ulimg" src="/css/img/tag.png" alt="">테그</a></li>
            <li class="main_li"><a href="#"><img class="main_ulimg" src="/css/img/employee.png" alt="">노동</a></li>
            <li class="main_li"><a href="#"><img class="main_ulimg" src="/css/img/environment.png" alt="">환경</a></li>
            <li class="main_li"><a href="#"><img class="main_ulimg" src="/css/img/cooperation.png" alt="">인권</a></li>
            <li class="main_li"><a href="#"><img class="main_ulimg" src="/css/img/society.png" alt="">사회</a></li>
            <li class="main_li"><a href="#"><img class="main_ulimg" src="/css/img/culture.png" alt="">문화</a></li>
            <li class="main_li"><a href="#"><img class="main_ulimg" src="/css/img/life.png" alt="">라이프</a></li>
        </ul>
    </div>
</template>
<script>
export default {
    name:'NavComponent',
}
</script>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

a {
    text-decoration: none;
    color: black;
}

body {
    box-sizing: border-box;
    width: 100vw;
    height: 100vh;
}

ul {
  list-style: none;
}
</style>