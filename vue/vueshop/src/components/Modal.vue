<template lang="">
    <div class="bg_black" name="modalAni" >
      <div class="bg_white">
        <img :src="data.img" alt="이미지">
        <h4>{{data.name}}</h4>
        <p>{{data.content}}</p>
        <p>{{data.price}} 원</p>
        <input type="text" v-model="productCnt">
        <p>총 가격 : {{ productCnt*data.price }} 원</p>
        <p>신고수 : {{data.reportCnt}}</p>
        <button @click="$emit('closeModal')">닫기</button>
        <!-- 하위에서 상위것을 수정할 때 상위에서 작성하고,
            받아올 데이터를 $emit('상위폴저 지정해둔명') 작성 -->
      </div>
    </div>
</template>
<script>
export default {
    name: 'Modal',
    data() {
        return {
            productCnt: "",
        }
    },
    // watch : data를 감시하는 함수를 정의하는 영역
    // 감시하고 싶은 데이터바인딩명과 함수의 명을 동일하게 지정해주기
    watch: {
        productCnt(input) {
            if(input > 10 || input < 0) {
                alert('안되!');
                this.productCnt = 0;
            }

        }
    },
    // 정보 체크는 프론트앤드, 백엔드에서 각 각 해줘야 함.
    props : {
        data: Object,
    }
}
</script>
<style lang="">
    
</style>