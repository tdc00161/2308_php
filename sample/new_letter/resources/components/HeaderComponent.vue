<template>
    <header>
        <a class="header_a" href="/">CK CK NEWSLETTER</a>
        <div class="header_div">
            <input class="header_input" type="text">
            <a class="header_btn" href="#"><img class="header_img" src="/css/img/search.png" alt=""></a>
            <a class="header_btn" href="/login"><img class="header_img" src="/css/img/user.png" alt="">
                <!-- <ul>
                    <li>마이페이지</li>
                    <li>프로필 설정</li>
                    <li>고객센터</li>
                    <li>로그아웃</li>
                </ul> -->
            </a>
        </div>
    </header>
    <hr>
</template>
<script>

    export default {
        name:'HeaderComponent',
    }
</script>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    box-sizing: border-box;
    width: 100vw;
    height: 100vh;
}

header {
    width: 100%;
    height: 200px;
    background-color: bisque;
    display: grid;
    grid-template-columns: repeat(3,1fr);
}

.header_a {
    display: inline-block;
    text-decoration: none;
    font-size: 3rem;
    font-weight: 900;
    text-align: center;
    grid-column: 2/3;
    min-width: 463px;
    line-height: 200px;
    color: black;
}

.header_div{
    display: inline-block;
    align-items: center;
    grid-column: 3/4;
    display: flex;
    justify-items: center;
    justify-content: center
}

.header_input {
    margin-right: 2px;
    width: 200px;
    height: 40px;
    border: 1px solid black;
    background-color: #fff;
}

.header_btn {
    margin-right: 1px;
    display: inline-block;
}

.header_img {
    width: 40px;
    height: 40px;
    border: 1px solid black;
}
</style>