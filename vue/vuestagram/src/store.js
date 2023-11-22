import { createStore } from 'vuex';
import axios from 'axios';

const store = createStore({
    //  state() : data를 저장하는 영역
    state() {
        return {
            boardData: [], // 게시글 저장용
            flgTapUI: 0, // 탭 ui용 플래그
            imgURL: '', // 작성탭 표시용 이미지 URL
            postFileData: null, // 글 작성파일 데이터 저장
            lastBoardId: 0, // 가장 마지막 로드 된 게시글 번호 저장용
        }
    },
    // mutations : 데이터 수정용 함수 저장 영역
    // setBoardList 첫번째 파라미터는 동일하게 적용
    mutations: {
        // 초기 데이터 셋팅용
        setBoardList(state, data) {
            state.boardData = data;
            state.lastBoardId = data[data.length - 1].id;
        },
        // 탭ui 셋팅용
        setFlgTapUI(state, num) {
            state.flgTapUI = num;
        },
        // 작성탭 표시용 이미지 URL 셋팅용
        setImgURL(state, url) {
            state.imgURL = url;
        },
        // 글작성 파일데이터 셋팅용
        setPostFileData(state, file) {
            state.postFileData = file;
        },
        // 작성된 글 삽입용
        setUnshiftBoard(state, data) {
            state.boardData.unshift(data);
        }, 
        // 작성 후 초기화 처리
        setClearAddData(state) {
            state.imgURL = '';
            state.postFileData = null;
        },
        // 데이터 불러오기
        BoardInput(state, data) {
            state.boardData = data;
            // state.boardData.push(data);
        }
        

    },

    // actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는
    // actions에 정의
    actions: {
        // 초기 게시글 데이터 획득 ajax 처리
        //↓ 아래 context 는 고정값으로 적어줘야함
        actionGetBoardList(context) {
            const url='http://112.222.157.156:6006/api/boards';
            // 현업에서는 도메인(api 전까지)은 따로 설정해두고 자동으로 설정되게 해둠
            const header = {
                headers: {
                    'Authorization':'Bearer meerkat'
                }
            };


            axios.get(url , header)
            // null값위치에 바디값을 설정, header 위치에 헤더값 설정
            .then(res => {
                console.log(res.status);
                console.log(res.data); // 오류 확인해볼 수 있음
                context.commit('setBoardList', res.data);
            })
            .catch(err => {console.log(err);
            })
        },
        // 글작성 처리
        actionPostBoardAdd(context) {
            const url='http://112.222.157.156:6006/api/boards';
            const header = {
                headers: {
                    'Authorization':'Bearer meerkat',
                    'Content-Type' : 'multipart/form-data',
                }
            };
            const data = {
                name: '양수진',
                img: context.state.postFileData,
                content: document.getElementById('content').value,

            };

            axios.post(url, data, header)
            .then(res => {
                // 작성글 데이터 저장
                context.commit('setUnshiftBoard', res.data);

                // 리스트 UI로 전환
                context.commit('setFlgTapUI', 0);

                // 작성 후 초기화 처리
                context.commit('setClearAddData');
            })
            .catch(err => {
                console.log(err);
            })
        },
        actionBoardInPut(context) {
            const url='http://112.222.157.156:6006/api/boards/'+'data.id';
            const header = {
                headers: {
                    'Authorization':'Bearer meerkat',
                }
            };

            axios.get(url , header)
            .then(res => {
                context.commit('BoardInput', res.data);
            })
            .catch(err => {console.log(err);
            })
        },
    }
});

export default store;