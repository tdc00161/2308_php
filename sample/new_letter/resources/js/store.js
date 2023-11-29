import { createStore } from 'vuex';
import axios from 'axios';

const store = createStore({

    state() {
        return {
            boardData: [],
            loginData: "",
            emailCheck: "",
            registrationData: "",
        }
    },

    mutations: {
        // 초기 데이터 셋팅용
        setBoardList(state, data) {
            state.boardData = data;
        },

        // 구독 이메일 확인
        subscribeData(state,data) {
            state.emailCheck = data;
        },

        // 로그인 화면 셋팅
        loginId(state, data){
            state.loginData = data;
        },

        // 회원가입 화면 셋팅
        registrationId(state, data) {
            state.registrationData = data;
        }
    },


    actions: {
        actionGetBoardList(context) {
            const url='/api/board';
            // const header = {
            //     headers: {
            //         'Authorization':'Bearer meerkat'
            //     }
            // };

            axios.get(url)
            .then(res => {
                // console.log(res.status);
                // console.log(res.data); // 오류 확인해볼 수 있음
                context.commit('setBoardList', res.data);
            })
            .catch(err => {console.log(err);
            })
        },

        registrationGet(context) {
            const url='/api/regist';

            axios.get(url)
            .then(res => {
                // console.log(res.status);
                // console.log(res.data); // 오류 확인해볼 수 있음
                context.commit('registrationId', res.data);
            })
            .catch(err => {console.log(err);
            })
        }
    }
});

export default store;