<template lang="">
    <div class="nav">
        <a v-for="item in data" :key="item">{{ item }}</a>
    </div>
</template>
<script>
export default {
    name: 'Header',
    // 상위에서 사용안될거란 확신이 있을때는 해당 파일에 작성해서 써도 괜찮음.
    // 이외의 경우 보편적으로는 상위폴더에서 상속받아서 받이 사용함
    // 상속 사용시 사용하므로 이득이 있는가를 먼저 생각해보고 작성
    // props: 상위 컴포넌트의 데이터를 하위 컴포넌트로
    // 상속 받는 파일내에서 props:{ 받아오는 명: 데이터 타입 } 으로 작성
    props: {
        data: Array,
    }


}
</script>
<style lang="">
</style>