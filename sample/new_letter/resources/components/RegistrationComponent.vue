<template>
    <main class="rgtmain">
        <div class="rgttitlediv">
            <p class="rgth">ck ck newletter</p>
            <br>
                <input class="rgtip" type="email" name="email" placeholder="이메일" required>
                <br>
                <input class="rgtip" type="password" name="pw" placeholder="비밀번호(8자 이상)" required>
                <br>
                <input class="rgtip" type="password" name="pwchk" placeholder="비밀번호 확인(8자 이상)" required>
                <br>
                <input class="rgtip" type="text" name="name" placeholder="닉네임" required>

                <div class="rgtagree">
                    <div class="divlb">
                        <input v-model="checked" class="main_inputchk" type="checkbox">모두 동의합니다
                    </div>
                    <div class="divlb">
                        <input v-model="checked" class="main_inputchk" type="checkbox">만 14세 이상 가입 동의 (필수)
                        <a class="rgta" href=".">약관보기</a>
                    </div>
                    <div class="divlb">
                        <input v-model="checked" class="main_inputchk" type="checkbox">이용약관 동의 (필수)
                        <a class="rgta" href=".">약관보기</a>
                    </div>
                    <div class="divlb">
                        <input v-model="checked" class="main_inputchk" type="checkbox">개인정보 수집/이용 동의 (필수)
                        <a class="rgta" href=".">약관보기</a>
                    </div>
                    <div class="divlb">
                        <input v-model="checked" class="main_inputchk" type="checkbox">뉴스레터 및 마케팅 정보 수신 동의 (선택)
                        <a class="rgta" href=".">약관보기</a>
                    </div>
                </div>

                <br><br><br>
                <button class="rgtbtn" type="submit">가입하기</button>
        </div>
    </main>
</template>
<script>
export default {
    name: 'RegistrationComponent',
    data() {
        return {
            checked:false
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

.rgttitlediv {
    width: 450px;
    height: 550px;
    margin: auto;
    padding: 10px;
}

.rgth {
    font-size: 2rem;
    font-weight: 700;
    text-align: center;
}

.rgtip {
    width: 400px;
    height: 50px;
    margin: 5px 0;
    padding-left: 20px;
}

.rgtip:focus {
    outline: none;
}

.rgtbtn {
    width: 400px;
    height: 50px;
    background-color: black;
    color: #fff;
    border-radius: 10px;
    border: none;
}

.rgtbtn:hover {
    background-color: white;
    border: 1px solid black;
    color: black;
}

.divlb {
    margin-top: 5px;
}

.rgta {
    font-weight: 900;
    text-decoration: underline;
}
</style>