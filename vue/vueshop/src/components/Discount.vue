<!-- vueinit 로 기본 설정함 -->
<template lang="">
  <div class="discount">
    <p>지금 당장 구매하시면, {{ discountNum }}% 할인</p>
  </div>
</template>
<script>
export default {
    name: 'Discount',
    // 파일을 만들게되면 export 내에 이름을 지정해줘야함. 파일명이랑 동일하게 해주면 됨.
    data() {
        return {
            discountNum:12,
            intervalInfo: null,
        }
    },
    // mounted() : 라이플사이클훅, mounted단계에서 실행되는 영역
    mounted() {
        this.intervalInfo = setInterval(() => {
            this.discountNum--;
        }, 1000);
    },
    updated() {
        if(this.discountNum === 10) {
            clearInterval(this.intervalInfo);
        }
    },


}
</script>
<style lang="">
    /* 공통되는건 app.vue 에 작성하고, Discount 에 작성하는건 본인한테 적용되는 것만 작성 */


</style>