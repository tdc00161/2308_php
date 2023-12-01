<template>
    <div class="first_div">
        <!-- 인트로 -->
        <div>
            <img class="title_img" src="/css/img/titleimg.png" alt="">
            <div class="title">우리가 시간이 없지, 세상이 안 궁금하냐!</div>
            <div class="title_div">   
                <div class="div_intro">
                    <img src="#" alt="">지금 <span  class="b_span">579,962명</span>이 뉴레를 읽고 있어요
                    <br><br>
                    세상 돌아가는 소식, 알고는 싶지만 신문 볼 새 없이 바쁜 게 우리 탓은 아니잖아요!
                    <br>
                    월/화/수/목/금 아침마다 세상 돌아가는 소식을 메일로 받아보세요.
                    <br><br>
                    <div>
                        <input class="intro_ip" type="email" v-model="inputEM" placeholder="이메일" required>
                        <br>
                        <input class="intro_ip" type="text" v-model="inputNK" placeholder="닉네임" required>
                        <br>
                        <label><input class="input_chk" type="checkbox" v-model="chkp" required><span class="b_span">개인정보 수집·이용</span>에 동의합니다</label>
                        <br>
                        <label><input class="input_chk" type="checkbox" v-model="chkm" required><span  class="b_span">광고성 정보 수신</span>에 동의합니다</label>
                        <br><br>
                        <button class="intro_btn" type="submit">뉴스레터 무료로 구독하기</button>
                        <a class="intro_bt" href="#">앱 다운로드하기 →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style>
    @import url('/css/common.css');

    input:focus {
        outline: none;
    }

    .first_div {
        width: 100vw;
        padding-bottom: 300px;
    }

    .b_span {
        font-weight: 600;
        text-decoration: underline;
    }

    .title_img {
        width: 400px;
        height: 500px;
        position: absolute;
        margin-top: 3rem;
        margin-left: 62%;
    }

    .title {
        font-size: 2rem;
        font-weight: 800;
        padding: 1em 0 1em 10rem;
        width: 100%;
        background-color: rgb(255, 213, 198);
    }

    .title_div {
        padding: auto 0;
        background-color: rgb(248, 104, 52);
    }

    .div_intro {
        width: 70%;
        height: 450px;
        padding: 4em 0 4em 10rem;
    }

    .intro_ip {
        width: 400px;
        height: 40px;
        margin-bottom: 5px;
    }

    .intro_ip::placeholder {
        padding-left: 10px;
    }

    .intro_btn {
        width: 250px;
        height: 50px;
        font-size: 15px;
        border: 1px solid black;
        border-radius: 10px;
    }

    .intro_bt {
        width: 250px;
        height: 50px;
        border: 1px solid black;
        background-color: black;
        border-radius: 10px;
        color: white;
        display: inline-block;
        font-size: 15px;
        margin: 0;
        text-align: center;
        line-height: 50px;
    }
</style>