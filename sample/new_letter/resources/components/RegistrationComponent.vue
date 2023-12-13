<template>
    <main class="rgt_main">
        <form v-on:submit="submitForm">
            <div class="rgt_title">
                <a href="/" class="rgt_p">CK CK NEWSLETTER</a>
                <br>
                <input class="rgt_ip"  type="email" v-model="email" placeholder="이메일" required>
                <br>
                <input class="rgt_ip" type="password" v-model="pw" placeholder="비밀번호(8자 이상)" required>
                <br>
                <input class="rgt_ip" type="password" v-model="pwchk" placeholder="비밀번호 확인(8자 이상)" required>
                <br>
                <input class="rgt_ip" type="text" v-model="name" placeholder="닉네임" required>
                <div class="rgt_agree">
                    <div class="div_lb">
                        <input v-model="totalchk" class="input_chk" type="checkbox">모두 동의합니다
                    </div>
                    <div class="div_lb">
                        <input v-model="agechk" class="input_chk" type="checkbox">만 14세 이상 가입 동의 (필수)
                        <a class="rgt_a" href=".">약관보기</a>
                    </div>
                    <div class="div_lb">
                        <input v-model="usechk" class="input_chk" type="checkbox">이용약관 동의 (필수)
                        <a class="rgt_a" href=".">약관보기</a>
                    </div>
                    <div class="div_lb">
                        <input v-model="perchk" class="input_chk" type="checkbox">개인정보 수집/이용 동의 (필수)
                        <a class="rgt_a" href=".">약관보기</a>
                    </div>
                    <div class="div_lb">
                        <input v-model="mkchk" class="input_chk" type="checkbox">뉴스레터 및 마케팅 정보 수신 동의 (선택)
                        <a class="rgt_a" href=".">약관보기</a>
                    </div>
                </div>
                <br><br>
                <button class="rgt_btn" type="submit">가입하기</button>
            </div>
        </form>
    </main>
</template>
<script>
    export default {
        name: 'RegistrationComponent',
        data: function() {
            return {
                checked:false,
                email: "",
                pw: "",
                pwchk: "",
                name: "",
                totalchk: "",
                agechk: "",
                usechk: "",
                perchk: "",
                mkchk: "",

            }
        },
        methods: {
            submitForm: function(context) {
                console.log(this.emaill, this.pw, this.pwchk)
                
            }
        }

    }
</script>
<style>
    @import url('/css/common.css');

    .rgt_main {
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        background-color: blanchedalmond;
        text-align: center;
    }

    .rgt_title {
        display: inline-block;
        margin: auto;
        width: 430px;
        height: 550px;
        padding: 10px;
        
    }

    .rgt_p {
        display: inline-block;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .rgt_ip {
        width: 400px;
        height: 50px;
        margin: 5px 0;
        padding-left: 20px;
    }

    .input_chk {
        margin: 0 5px 0 0;
        accent-color: black;
    }

    .rgt_agree {
        text-align: left;
        margin: 15px 0 0 6px;
    }

    .rgt_ip:focus {
        outline: none;
    }

    .rgt_btn {
        width: 400px;
        height: 50px;
        background-color: black;
        color: #fff;
        border-radius: 10px;
        border: none;
    }

    .div_lb {
        margin-top: 5px;
    }

    .rgt_a {
        font-weight: 900;
        text-decoration: underline;
    }
</style>