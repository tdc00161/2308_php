<template>
    <div>
        <HeaderComponent/>
        <NavComponent></NavComponent>
        <CardComponent></CardComponent>
        <button @onclick=""
        v-if="$store.state.flgBtnMoreView" class="main_plusbtn" type="button">더보기</button>
        <FooterComponent/>
    </div>
</template>
<script>
import HeaderComponent from './layout/HeaderComponent.vue'
import NavComponent from './NavComponent.vue';
import CardComponent from './CardComponent.vue';
import FooterComponent from './layout/FooterComponent.vue'

export default {
    name: 'TabComponent',
    components: {
        HeaderComponent,
        NavComponent,
        CardComponent,
        FooterComponent,
    },
    created() {

    }
}
</script>
<style>
    @import url('/css/common.css');
</style>