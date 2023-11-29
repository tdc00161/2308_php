<template>
    <div>
        <!-- 인트로 -->
        <div class="main_firstdiv">
            <img class="main_titleimg" src="/css/img/titleimg.png" alt="">
            <div class="main_title">우리가 시간이 없지, 세상이 안 궁금하냐!</div>
            <div class="main_titlediv">   
                <div class="main_intro">
                    <img src="#" alt=""> 지금 <span>579,962명</span>이 뉴레를 읽고 있어요
                    <br><br>
                    세상 돌아가는 소식, 알고는 싶지만 신문 볼 새 없이 바쁜 게 우리 탓은 아니잖아요!
                    <br>
                    월/화/수/목/금 아침마다 세상 돌아가는 소식을 메일로 받아보세요.
                    <br><br>
                    <div>
                        <input class="main_introip" type="email" v-model="inputEM" required>
                        <br>
                        <input class="main_introip" type="text" v-model="inputNK" required>
                        <br>
                        <label><input class="main_inputchk" type="checkbox" v-model="checked" required><span>개인정보 수집·이용</span>에 동의합니다</label>
                        <br>
                        <label><input class="main_inputchk" type="checkbox" v-model="checked" required><span>광고성 정보 수신</span>에 동의합니다</label>
                        <br><br>
                        <button class="main_btn" type="submit">뉴스레터 무료로 구독하기</button>
                        <a class="main_bt" href="#">앱 다운로드하기 →</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 메뉴 -->
        <NavComponent></NavComponent>

        <!-- 게시글 -->
        <CardComponent></CardComponent>

        <a class="main_plusbtn" href="#">더보기</a>
    </div>
</template>
<script>
import CardComponent from './CardComponent.vue';
import NavComponent from './NavComponent.vue';

export default {
    name: "MainComponent",
    data() {
        return {
            inputEM: "",
            importNK: "",
            checked: false,
        }
    },
    components: {
        CardComponent,
        NavComponent,
    }
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

label {
    margin: 20px 0;
}

span {
    font-weight: 600;
    text-decoration: underline;
}

.main_titleimg {
    width: 400px;
    height: 500px;
    position: absolute;
    margin-top: 3rem;
    margin-left: 62%;
}

.main_title {
    font-size: 2rem;
    font-weight: 800;
    padding: 1em 0 1em 10rem;
    width: 100%;
    background-color: rgb(255, 213, 198);
}

.main_titlediv {
    padding: auto 0;
    background-color: rgb(248, 104, 52);
}

.main_intro {
    width: 70%;
    height: 450px;
    padding: 4em 0 4em 10rem;
}

.main_introip {
    width: 400px;
    height: 40px;
    margin-top: 5px;
}

.main_inputchk {
    margin: 0 5px 0 0;
    accent-color: black;
}

.main_btn {
    width: 250px;
    height: 50px;
    border: 1px solid black;
    border-radius: 10px;
}

.main_bt {
    width: 250px;
    height: 50px;
    border: 1px solid black;
    background-color: black;
    border-radius: 10px;
    color: white;
    display: inline-block;
    margin: 0;
    text-align: center;
    line-height: 50px;
}

.main_ul {
    list-style: none;
    /* width: 100%; */
    height: 60px;
    line-height: 60px;
    display: flex;
    justify-content: center;
    background-color: antiquewhite;
}
.main_li {
    float:left;
    font-weight: 700;
    margin: 0 20px 0 20px;
}

.main_ulimg {
    width: 15px;
    height: 15px;
    box-sizing: border-box;
    justify-content: center;
}

.main_card {
    display: table;
    border-collapse: collapse;
    width: 80%;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4,1fr);
    grid-template-rows: repeat(4, 1fr);
}

.main_divcard {
    height: 350px;
    border: 1px solid black;
    display: table-cell;
}

.main_cardimg {
    width: 100%;
    height: 200px;
}

.main_plusbtn {
    width: 250px;
    height: 50px;
    background-color: antiquewhite;
    border-radius: 15px;
    display: inline-block;
    text-align: center;
    line-height: 50px;
    margin-bottom: 10px;
}
</style>