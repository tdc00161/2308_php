import { createStore } from 'vuex';
import axios from 'axios';

const store = createStore({

    state() {
        return {
            boardData: [],
            loginData: "",
            emailCheck: "",
            registrationData: "",
            lastBoardId: 0,
            flgBtnMoreView: true,
            flgTabUI: 0,
        }
    },

    mutations: {
        // 초기 데이터 셋팅용
        setBoardList(state, data) {
            state.boardData = data;
            this.commit('lastBoardId', data[data.length - 1].id);
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
        },

        // 탭ui 셋팅용
        setFlgTabUI(state, num) {
            state.flgTabUI = num;
        },

        // 마지막 게시글 번호 셋팅용
        setLastBoardId(state, num) {
            state.lastBoardId = num;
        },

        // 더보기 데이터 추가
        setAddBoardData(state, data) {
            state.boardData.push(data);
        },

        // 더보기 버튼 활성화
        setFlgBtnMoreView(state, boo) {
            state.flgBtnMoreView = boo;
        },
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
        },

        LoginGet(context) {
            const url='/api/login';

            axios.get(url)
            .then(res => {
                // console.log(res.status);
                // console.log(res.data); // 오류 확인해볼 수 있음
                context.commit('loginId', res.data);
            })
            .catch(err => {console.log(err);
            })
        },

        // 더보기
        actionGetBoardItem(context) {
            console.log(context);
            const url = '/api/board' + context.state.lastBoardId;

            axios.get(url)
            .then(res => {
                if(res.data) {
                    context.commit('setAddBoardData', res.data);
                    context.commit('setLastBoardId', res.data.id);
                } else {
                    context.commit('setFlgBtnMoreView', false);
                }
            })
            .catch(err => console.log(err.response.data))
        },

    }
});

export default store;