<template>
    <div class="login_bg">
        <div class="login_div">
            <a href="/" class="login_p">CK CK NEWSLETTER</a>
            <br>
            <a class="login_bt" href="#">
                <div class="login_bta">
                    <img class="login_img" src="css/img/google.png" alt="">
                    <div class="login_btb">구글로 시작하기</div>
                </div>
            </a>
            <hr class="login_hr">
                <input class="login_input" type="text" v-model="id" placeholder="아이디">
            <br>
                <input class="login_input" type="password" v-model="pw" placeholder="비밀번호">
            <br>
            <a class="login_pw" href=".">비밀번호를 잊으셨나요?</a>
            <br>
            <button class="login_btn" type="submit">로그인</button>
            <br>
            <a class="login_rg" href="/regist">회원가입하기</a>
        </div>
    </div>    
</template>
<script>
    export default {
        name: 'LoginComponent',
        data() {
            return {
                id:"",
                pw:"",
            }
        },

    }
</script>
<style>
    @import url('/css/common.css');

    .login_bg {
        background-color: rgb(249, 194, 91);
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login_div {
        width: 430px;
        height: 550px;
        padding: 10px;
        background-color: transparent;
        text-align: center;
    }

    .login_p {
        display: inline-block;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .login_hr {
        width: 400px;
        border: 1px solid black;
        margin: 10px 0;
        text-align: center;
        display: inline-block;
    }

    .login_input {
        width: 400px;
        height: 50px;
        border: 1px solid black;
        background-color: #fff;
        font-size: 1rem;
        padding-left: 20px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .login_input::placeholder {
        font-size: 1rem;
    }

    .login_pw {
        font-size: 1rem;
        text-decoration: underline;
        text-align: left;
        margin: 5px 0 0 20px;
        display: block;
    }

    .login_rg {
        font-size: 1rem;
        text-decoration: underline;
    }

    .login_btn {
        width: 400px;
        height: 50px;
        border: none;
        background-color: black;
        border-radius: 10px;
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #fff;
    }

    .login_bt {
        width: 400px;
        height: 50px;
        border: 1px solid black;
        background-color: #fff;
        border-radius: 5px;
        display: inline-block;
        line-height: 50px;
        padding-left: 20px;
    }

    .login_bta {
        display: flex;
        justify-content: flex-start;
        align-items: center
    }

    .login_img {
        width: 30px;
        height: 30px;
    }

    .login_btb {
        font-size: 20px;
        display: inline-block;
        margin-left: 10px;
    }
</style>