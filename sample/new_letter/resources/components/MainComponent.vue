<template>
    <div>
        <HeaderComponent/>
        <BoardComponent/>
        <FooterComponent/>
    </div>
</template>
<script>
import HeaderComponent from './layout/HeaderComponent.vue'
import BoardComponent from './BoardComponent.vue'
import FooterComponent from './layout/FooterComponent.vue'

export default {
    name: 'MainComponent',
    components: {
        HeaderComponent,
        BoardComponent,
        FooterComponent,
    }
}
</script>
<style>
    @import url('/css/common.css');

    
</style>