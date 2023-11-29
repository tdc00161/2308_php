<template>
    <main>
        <div class="login_div">
            <p>CK CK NEWSLETTER</p>
            <br>
            <a class="login_bt" href="#">
                <div class="login_bta">
                    <img src="css/img/google.png" alt="">
                    <div class="login_btb">구글로 시작하기</div>
                </div>
            </a>
            <hr>
                <input type="text" v-model="id" placeholder="아이디">
            <br>
                <input type="password" v-model="pw" placeholder="비밀번호">
            <br>
            <a class="pw" href=".">비밀번호를 잊으셨나요?</a>
            <br>
            <button class="btn" type="submit">로그인</button>
            <br>
            <a class="rg" href="/regist">회원가입하기</a>
        </div>    
    </main>
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

main {
    background-color: rgb(249, 194, 91);
    width: 100%;
    min-height: 100%;
    position: relative;
    padding-bottom: 250px;
}

form {
    display: inline-block;
    margin: 30%;
}

.login_div {
    width: 600px;
    height: 800px;
    padding: 30px;
    font-size: 2rem;
    border-radius: 20px;
    background-color: transparent;
    text-align: center;
}

p {
    font-size: 3rem;
    font-weight: 900;
    margin-top: 20px;
}

hr {
    border: 2px solid black;
    margin: 30px 0;
    width: 550px;
}

input {
    width: 550px;
    height: 70px;
    border: 1px solid black;
    background-color: #fff;
    font-size: 1.5rem;
    padding-left: 30px;
    margin-bottom: 15px;
}

input::placeholder {
    font-size: 20px;
}

.pw {
    font-size: 1rem;
    text-decoration: underline;
    text-align: left;
    margin-left: 10px;
    display: block;
}

.rg {
    font-size: 1.5rem;
    text-decoration: underline;
}

button {
    width: 550px;
    height: 80px;
    border: none;
    background-color: black;
    border-radius: 10px;
    font-size: 1.5rem;
    margin-bottom: 30px;
    color: #fff;
}

.bt {
    width: 550px;
    height: 60px;
    border: 1px solid black;
    background-color: #fff;
    border-radius: 5px;
    display: inline-block;
    line-height: 60px;
    padding-left: 20px;
}

.bta {
    display: flex;
    justify-content: flex-start;
    align-items: center
}

img {
    width: 30px;
    height: 30px;
}

.btb {
    font-size: 20px;
    display: inline-block;
    margin-left: 10px;
}
</style>