<template>
    <div>
        <h1>APP VUE 컴포넌트</h1>
        <h2>{{ $store.state.testStr }}</h2>
        <h2>라라벨 데이터 name : {{ laravelData.name }}</h2>
        <h2>라라벨 데이터 id : {{ laravelData.id }}</h2>
        <a href="/login">로그인</a>
        <ul>
            <li><a href="/">루트</a></li>
            <li><a href="/login">로그인</a></li>
            <li><a href="/board">보드</a></li>
            <!-- 라라벨의 라우터 -->
        </ul>
        <router-link to="/login">라우터 로그인</router-link>
        <router-link to="/board">라우터 로그인</router-link>
        <!-- 뷰의 라우터/화면만 렌더링하는 것 / ajax로 데이터를 받아오는 방법이 있음-->
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    name: 'AppComponent',
    props: {
        laravelData: Object,
    },
    beforeCreate() {
        this.$store.commit('setLaravelData', this.laravelData);
    },

}
</script>
<style>
    
</style>