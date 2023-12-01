<template>
    <div>
        <!-- 헤더 -->
        <HeaderComponent></HeaderComponent>

        <!-- 인트로 -->
        <BoardIntroComponent></BoardIntroComponent>

        <!-- 메뉴 -->
        <NavComponent></NavComponent>

        <!-- 게시글 -->
        <CardComponent></CardComponent>
        
        <button @click="$store.dispatch('actionGetBoardItem')" 
            v-if="$store.state.flgBtnMoreView"
            class="main_plusbtn" type="button">더보기
        </button>

        <!-- 푸터 -->
        <FooterComponent></FooterComponent>
    </div>
</template>
<script>
import BoardIntroComponent from './BoardIntroComponent.vue';
import NavComponent from './NavComponent.vue';
import CardComponent from './CardComponent.vue';
import HeaderComponent from './layout/HeaderComponent.vue';
import FooterComponent from './layout/FooterComponent.vue';

export default {
    name: "BoardComponent",
    data() {
        return {
            inputEM: "",
            inputNK: "",
            chkp: false,
            chkm: false,
        }
    },
    components: {
    BoardIntroComponent,
    NavComponent,
    CardComponent,
    HeaderComponent,
    FooterComponent
},
    created() {
    this.$store.dispatch('actionGetBoardList');
  },
}
</script>
<style>
    #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: black;
    }

    @import url('/css/common.css');

    /* label {
        margin: 20px 0;
    } */



    .main_plusbtn {
        width: 250px;
        height: 50px;
        border: none;
        background-color: antiquewhite;
        border-radius: 15px;
        display: inline-block;
        line-height: 50px;
        margin-top: 50px;
        display: flex;
        font-weight: 700;
        justify-content: center;
    }
</style>