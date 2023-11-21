<template>
  <img alt="Vue logo" src="./assets/logo.png">
  

  <!-- 헤더
  컴포넌트로 이관 -->
  <Header :data="navList"></Header>
  <!--props: 상위에서 하위에 데이터를 전달할 때 해당 영역에 :받을 명 = "보낼 데이터명" 
  다른 데이터로 사용하려면 옆에 연결해서 작성해주면됨-->
  <!-- <div class="nav"> -->
    <!-- <a href="#">홈</a>
    <a href="#">상품</a>
    <a href="#">기타</a> -->

    <!-- 반복문 -->
    <!-- <a v-for="item in navList" :key="item">{{ item }}</a> -->
    <!-- v-for="받는 값 in 루프돌린 원본" :key="받는 값과 맞춰주면 됨
      키값이 있는 경우 v-for=(받는 값, 키 값) in 루프돌린 원본" :key="키값이름과
      동일{{ 키 값+':'+키값( 필요없을 경우 아이템값과 동일하게 맞춰주기) }}" -->
    <!-- 추가로 값을 더해주면 그 값까지 반복해서 돌아감 -->
    <!-- v-for = 반복되거나 키 값이 있을경우 담을 수 있음 -->
  <!-- </div> -->
  
  <!-- 할인 배너 
  컴포넌트로 이관-->
  <Discount></Discount>
  <!-- <Discount/>로 HTML 작성이 가능함 -->
  <!-- <div class="discount">
    <p>지금 당장 구매하시면, 30% 할인</p>
  </div> -->

  <!-- 모달 컴포넌트로 이관-->
  <transition name="modalAni">
    <Modal v-if="modalFlg" :data = "modalProduct" @closeModal = "modalClose"></Modal>
    <!-- 하위쪽에서 상위것을 수정하길 원할 때 @명에 만든 데이터를 담기 -->
    <!-- <div class="bg_black" v-if="modalFlg" name="modalAni" >
      <div class="bg_white">
        <img :src="modalProduct.img" alt="이미지">
        <h4>{{modalProduct.name}}</h4>
        <p>{{modalProduct.content}}</p>
        <p>{{modalProduct.price}} 원</p>
        <p>신고수 : {{modalProduct.reportCnt}}</p>
        <button @click="modalClose()">닫기</button>
      </div>
    </div> -->
  </transition>
  <!-- 트랙잭션으로 범위 설정 및 네임 설정하고, CSS 에서 설정해두면 애니메이션 효과가 발생 -->

  <!-- 예제 연습해보기 -->
  <!-- 상품 리스트 -->
  <List :data1="products" @openModal = "modalOpen" @countDown="plusOne" @closeModal = "modalClose"></List>
  <!-- <div> -->
    <!-- div v-for="(item, i) in products" :key="i"> -->
      <!-- v-for 에 받는 값이 하나일 경우 밸류값이 된다. 이때 뒤에 키값도 밸류값으로 설정 -->
      <!-- 반복문 돌릴 때 어떤것을 반복할 것인지를 정확히 인지하고 반복문 작성하기 -->
      <!-- <h4 @click="modalOpen(item)">{{item.name}}</h4> -->
      <!-- @click 할 때 modalFlg 가 true 이면 창이 뜨고, false 면 숨겨짐 -->
      <!-- <p>{{item.price}} 원</p>
      <button @click="item.reportCnt++">허위 매물 신고</button>
      <span>신고수 : {{ item.reportCnt }}</span>
    </div> -->
<!-- </div> -->


    
<!-- 
    <div>
      <h4 :style="sty_color_red">{{ products[0] }}</h4>
      <p>{{ prices[0] }} 원</p>
    </div>
    <div>
      <h4>{{ products[1] }}</h4>
      <p>{{ prices[1] }} 원</p>
    </div>
    <div>
      <h4>{{ products[2] }}</h4>
      <p>{{ prices[2] }} 원</p>
    </div> -->


</template>
<!-- 뷰 자체 서버를 열어서 작업하는게 바로 확인이 가능 -->

<script>
import data from './assets/js/data.js';
// js 에 다른파일 불러올 때 사용하는 경로설정
import Discount from './components/Discount.vue';
import Header from './components/Header.vue';
import Modal from './components/Modal.vue';
import List from './components/List.vue';

export default {
  name: 'App',
  
  // 데이터 바인딩 : 우리가 사용할 데이터를 저장하는 공간
  data() {
    return {
      navList: ['홈','상품','기타','문의'],
      sty_color_red: 'color: red; font-size: 4rem;',
      // products: [
      //   {name : '양말', content: '매우 아름다운 양말입니다.', price : 1500, reportCnt : 0, img: require('@/assets/img/outer.jpg')},
      //   {name : '티셔츠', content: '매우 아름다운 티셔츠입니다.', price : 24000, reportCnt : 0, img: require('@/assets/img/shirt.jpg')},
      //   {name : '바지', content: '매우 아름다운 바지입니다.', price : 50000, reportCnt : 0, img: require('@/assets/img/pants.jpg')},
      // ],
      products: data,
      modalFlg: false,
      modalProduct: {}
    }
  },

  // methods : 함수를 정의하는 영역
  methods: {
    plusOne(i) {
      this.products[i].reportCnt++;
    },
    modalOpen(item) {
      this.modalFlg = true;
      this.modalProduct =item;
    },
    modalClose() {
      this.modalFlg = false;
    }
  },

  // components : 컴포넌트를 등록하는 영역
  components: {
    Discount,
    Header,
    Modal,
    List,
  },
}
</script>

<style>
@import url('./assets/css/common.css');

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

/* css로 이관 */
/* .nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}

.nav a {
  color: #fff;
  padding: 10px;
  text-decoration: none;
} */
</style>
